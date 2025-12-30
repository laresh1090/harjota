import * as esbuild from 'esbuild';
import { readFileSync, writeFileSync, mkdirSync } from 'fs';
import { dirname } from 'path';

// Minify CSS
const cssInput = 'public/css/main.css';
const cssOutput = 'public/css/main.min.css';

const cssContent = readFileSync(cssInput, 'utf8');
const minifiedCss = await esbuild.transform(cssContent, {
    loader: 'css',
    minify: true,
});

mkdirSync(dirname(cssOutput), { recursive: true });
writeFileSync(cssOutput, minifiedCss.code);
console.log(`✓ CSS minified: ${cssInput} → ${cssOutput}`);

// Minify JS
const jsInput = 'public/js/main.js';
const jsOutput = 'public/js/main.min.js';

const jsContent = readFileSync(jsInput, 'utf8');
const minifiedJs = await esbuild.transform(jsContent, {
    loader: 'js',
    minify: true,
});

writeFileSync(jsOutput, minifiedJs.code);
console.log(`✓ JS minified: ${jsInput} → ${jsOutput}`);

// Show size comparison
const cssOriginal = Buffer.byteLength(cssContent);
const cssMinified = Buffer.byteLength(minifiedCss.code);
const jsOriginal = Buffer.byteLength(jsContent);
const jsMinified = Buffer.byteLength(minifiedJs.code);

console.log('\n📊 Size comparison:');
console.log(`   CSS: ${(cssOriginal/1024).toFixed(1)}KB → ${(cssMinified/1024).toFixed(1)}KB (${Math.round((1 - cssMinified/cssOriginal) * 100)}% reduction)`);
console.log(`   JS:  ${(jsOriginal/1024).toFixed(1)}KB → ${(jsMinified/1024).toFixed(1)}KB (${Math.round((1 - jsMinified/jsOriginal) * 100)}% reduction)`);
