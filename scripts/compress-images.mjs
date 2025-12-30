import sharp from 'sharp';
import { readdirSync, statSync, existsSync, mkdirSync } from 'fs';
import { join, extname, basename } from 'path';

const PUBLIC_DIR = 'public';
const OUTPUT_DIR = 'public/images/optimized';

// Images to process
const imagesToProcess = [
    'public/harjota.jpg',
    'public/harjota1.jpg',
    'public/harjota2.jpg',
    'public/harjota_og.jpg'
];

// Ensure output directory exists
if (!existsSync(OUTPUT_DIR)) {
    mkdirSync(OUTPUT_DIR, { recursive: true });
}

async function processImage(inputPath) {
    const filename = basename(inputPath, extname(inputPath));
    const stats = statSync(inputPath);
    const originalSize = stats.size;

    console.log(`\nProcessing: ${inputPath}`);
    console.log(`  Original size: ${(originalSize / 1024 / 1024).toFixed(2)} MB`);

    try {
        // Create optimized JPG (for fallback)
        const jpgOutput = join(OUTPUT_DIR, `${filename}.jpg`);
        await sharp(inputPath)
            .resize(1200, 800, { fit: 'inside', withoutEnlargement: true })
            .jpeg({ quality: 80, progressive: true })
            .toFile(jpgOutput);

        const jpgStats = statSync(jpgOutput);
        console.log(`  Optimized JPG: ${(jpgStats.size / 1024).toFixed(0)} KB (${Math.round((1 - jpgStats.size / originalSize) * 100)}% reduction)`);

        // Create WebP version
        const webpOutput = join(OUTPUT_DIR, `${filename}.webp`);
        await sharp(inputPath)
            .resize(1200, 800, { fit: 'inside', withoutEnlargement: true })
            .webp({ quality: 80 })
            .toFile(webpOutput);

        const webpStats = statSync(webpOutput);
        console.log(`  WebP: ${(webpStats.size / 1024).toFixed(0)} KB (${Math.round((1 - webpStats.size / originalSize) * 100)}% reduction)`);

        // Create AVIF version (best compression)
        const avifOutput = join(OUTPUT_DIR, `${filename}.avif`);
        await sharp(inputPath)
            .resize(1200, 800, { fit: 'inside', withoutEnlargement: true })
            .avif({ quality: 65 })
            .toFile(avifOutput);

        const avifStats = statSync(avifOutput);
        console.log(`  AVIF: ${(avifStats.size / 1024).toFixed(0)} KB (${Math.round((1 - avifStats.size / originalSize) * 100)}% reduction)`);

        return {
            original: originalSize,
            jpg: jpgStats.size,
            webp: webpStats.size,
            avif: avifStats.size
        };
    } catch (err) {
        console.error(`  Error: ${err.message}`);
        return null;
    }
}

async function main() {
    console.log('🖼️  Image Compression & WebP/AVIF Conversion');
    console.log('='.repeat(50));

    let totalOriginal = 0;
    let totalOptimized = 0;

    for (const imagePath of imagesToProcess) {
        if (existsSync(imagePath)) {
            const result = await processImage(imagePath);
            if (result) {
                totalOriginal += result.original;
                totalOptimized += result.avif; // Using AVIF as the smallest
            }
        } else {
            console.log(`\nSkipping (not found): ${imagePath}`);
        }
    }

    console.log('\n' + '='.repeat(50));
    console.log('📊 SUMMARY');
    console.log(`  Total original: ${(totalOriginal / 1024 / 1024).toFixed(2)} MB`);
    console.log(`  Total optimized (AVIF): ${(totalOptimized / 1024 / 1024).toFixed(2)} MB`);
    console.log(`  Total savings: ${((totalOriginal - totalOptimized) / 1024 / 1024).toFixed(2)} MB (${Math.round((1 - totalOptimized / totalOriginal) * 100)}%)`);
    console.log('\n✅ Optimized images saved to: public/images/optimized/');
    console.log('\nUsage in Blade templates:');
    console.log(`  <picture>
    <source srcset="{{ asset('images/optimized/harjota.avif') }}" type="image/avif">
    <source srcset="{{ asset('images/optimized/harjota.webp') }}" type="image/webp">
    <img src="{{ asset('images/optimized/harjota.jpg') }}" alt="Description">
  </picture>`);
}

main().catch(console.error);
