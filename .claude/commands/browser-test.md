---
argument-hint: <features-to-test> [role:consultant|client|admin] [port:8051] [reference-docs]
description: Comprehensive browser testing using Chrome DevTools MCP with automated issue resolution - supports consultant, client, and admin roles
allowed-tools: Task, Read, Glob, Bash, Write, Edit, MultiEdit, Grep
---

I need to perform comprehensive browser testing using Chrome DevTools MCP and systematically fix all issues.

**Features to Test**: $1
**User Role**: ${2:-consultant}
**Server Port**: ${3:-8051}
**Reference Documentation**: ${4:-N/A}

## ROLE CONFIGURATION

**Role Detection**: Using role **"${2:-consultant}"**

### Automatic Role Detection
If role argument is not provided, detect from the features-to-test statement:
- Contains "consultant", "workspace", "services/create" → **consultant**
- Contains "client", "dashboard", "cases" → **client**
- Contains "admin", "settings", "users", "system" → **admin**
- If ambiguous or not detected → **prompt user to confirm**

### Consultant Role
- **Landing URL**: `http://localhost:${3:-8051}/consultant/*`
- **Email**: `john.consultant@portify.com`
- **Password**: `Password123!`

### Client Role
- **Landing URL**: `http://localhost:${3:-8051}/client/*`
- **Email**: `maria.client@example.com`
- **Password**: `Password123!`

### Admin Role
- **Landing URL**: `http://localhost:${3:-8051}/admin/*`
- **Email**: `superadmin@portify.com`
- **Password**: `Password123!`

## 🚨 MANDATORY: SUBAGENT-FIRST ARCHITECTURE

**CRITICAL RULE: EVERYTHING USES SUBAGENTS**

### Subagent Requirements
- **ALL tasks MUST use subagents (!IMPORTANT!)** - Explorations, feature tests, documentations and error fixing
- **Maximize parallelization** - run independent tasks simultaneously
- **Never do work directly** - always delegate via Task tool

### Parallel Subagent Instructions
When running multiple subagents simultaneously, instruct EACH:
```
"⚠️ PARALLEL MODE: Other subagents are working concurrently on different tasks.
📝 YOU ARE: Subagent [X] of [N] working on [specific task].
🌐 TESTING: Open a NEW browser tab for your tests (don't reuse existing tabs).
🚫 ZERO TOLERANCE: NO placeholders, stubs, or TODOs. Production-ready code only."
```

## CRITICAL TESTING STANDARDS

**ZERO TOLERANCE POLICY - COMPREHENSIVE TESTING REQUIRED:**

1. **EXHAUSTIVE BROWSER TESTING**:
   - ❌ NEVER skip testing any user interaction
   - ❌ NEVER assume functionality works without verification
   - ❌ NEVER ignore console errors or warnings
   - ✅ TEST every button, link, form, and interactive element
   - ✅ VERIFY all API calls succeed with expected responses
   - ✅ CHECK all navigation flows work correctly
   - ✅ VALIDATE all data displays properly
   - ✅ CONFIRM all error states are handled

2. **COMPLETE ISSUE DOCUMENTATION**:
   - Document EVERY issue discovered
   - Include screenshots/evidence for each issue
   - Categorize issues by severity and type
   - Provide exact reproduction steps
   - Capture console errors, network failures, UI glitches

3. **SYSTEMATIC ISSUE RESOLUTION**:
   - Fix ALL issues before marking testing complete
   - Verify each fix resolves the issue completely
   - Re-test after fixes to ensure no regressions
   - Use subagents for all fix implementations

4. **TOKEN LIMITS ARE IRRELEVANT**:
   - Do NOT consider token usage during testing or fixes
   - Test as thoroughly as needed regardless of complexity
   - Use as many subagents as required for comprehensive coverage

## TEST ENVIRONMENT SETUP

**Server Information:**
- Server URL: `http://localhost:${3:-8051}`
- Starting Page: `http://localhost:${3:-8051}/${2:-consultant}/*`
- Server Status: **Already running** (DO NOT start a new server)

**Authentication Credentials (for ${2:-consultant} role):**
- Email: See role configuration above
- Password: See role configuration above

**IMPORTANT**
- Use subagents for ALL tasks

**Authentication Flow:**
If redirected to login:
1. Click "Sign in" button
2. On landing page, enter credentials based on selected role
3. Proceed with testing after successful login

## COMPREHENSIVE TESTING CHECKLIST

### Pre-Test Setup (Subagent 1)

**Tasks:**
- [ ] Verify server is running at `http://localhost:${3:-8051}`
- [ ] Identify user role: ${2:-consultant}
- [ ] Set credentials based on role
- [ ] Launch Chrome DevTools MCP
- [ ] Navigate to starting URL
- [ ] Handle authentication if needed
- [ ] Confirm page loads successfully
- [ ] Clear browser console
- [ ] Take baseline screenshot

**Verification:**
- Page loads without errors
- User is authenticated with correct role
- Console is clean
- Starting state is as expected

### Visual & Layout Testing (Subagent 2)

**Tasks:**
- [ ] Check page layout renders correctly
- [ ] Verify responsive design (desktop, tablet, mobile)
- [ ] Check for overlapping elements
- [ ] Verify all images load
- [ ] Check text readability and font rendering
- [ ] Verify colors and styling match design
- [ ] Check for alignment issues
- [ ] Verify loading states/spinners appear appropriately

**Document any issues:**
- Layout breaks or overlaps
- Missing or broken images
- Styling inconsistencies
- Responsive design problems

### Form Testing (Subagent 3)

**Tasks:**
- [ ] Identify all forms on the page
- [ ] Test each form field:
  - Input text fields
  - Textareas
  - Dropdowns/selects
  - Checkboxes
  - Radio buttons
  - File uploads
  - Date pickers
- [ ] Test field validation:
  - Required field validation
  - Format validation (email, phone, etc.)
  - Min/max length validation
  - Custom business rules
- [ ] Test form submission:
  - Valid data submission
  - Invalid data submission
  - Network error handling
  - Success/error messages
- [ ] Test form reset/clear functionality
- [ ] Test autofill behavior
- [ ] Test tab order and keyboard navigation

**Document any issues:**
- Validation not working
- Submission failures
- Missing error messages
- Incorrect success messages
- Accessibility issues

### Navigation Testing (Subagent 4)

**Tasks:**
- [ ] Test all navigation links
- [ ] Test breadcrumb navigation
- [ ] Test back button behavior
- [ ] Test forward button behavior
- [ ] Test deep linking (direct URL access)
- [ ] Test route parameters
- [ ] Test query parameters
- [ ] Test hash navigation
- [ ] Test 404 handling
- [ ] Test unauthorized access redirects
- [ ] Test role-specific navigation restrictions

**Document any issues:**
- Broken links (404s, wrong URLs)
- Navigation loops
- Missing redirects
- Incorrect route handling
- Back button issues
- Role permission issues

### Button & Action Testing (Subagent 5)

**Tasks:**
- [ ] Identify all clickable elements (buttons, links, icons)
- [ ] Test each button/action:
  - Click behavior
  - Loading/disabled states during processing
  - Success outcome
  - Error outcome
  - Multiple rapid clicks (debouncing)
- [ ] Test dropdown menus
- [ ] Test modal/dialog triggers
- [ ] Test tooltips
- [ ] Test context menus (right-click)
- [ ] Test keyboard shortcuts

**Document any issues:**
- Buttons not responding
- Missing loading states
- Actions failing silently
- Multiple submissions allowed
- Incorrect outcomes

### API & Network Testing (Subagent 6)

**Tasks:**
- [ ] Monitor Network tab in DevTools
- [ ] For each API call, verify:
  - Request method (GET, POST, PUT, DELETE)
  - Request URL correctness
  - Request headers (auth tokens, content-type)
  - Request payload structure
  - Response status code
  - Response payload structure
  - Response time (performance)
- [ ] Test error scenarios:
  - Network timeout
  - 400 errors (bad request)
  - 401 errors (unauthorized)
  - 403 errors (forbidden)
  - 404 errors (not found)
  - 500 errors (server error)
- [ ] Check for CORS issues
- [ ] Verify loading indicators during API calls
- [ ] Check for duplicate API calls
- [ ] Verify proper error messages displayed
- [ ] Verify role-based API access restrictions

**Document any issues:**
- API calls failing
- Wrong endpoints called
- Incorrect request/response formats
- Missing error handling
- Performance issues
- CORS errors
- Role permission issues in API

### Console Monitoring (Subagent 7)

**Tasks:**
- [ ] Monitor browser console continuously
- [ ] Document all console messages:
  - Errors (red)
  - Warnings (yellow)
  - Info messages
  - Debug logs
- [ ] Categorize console issues:
  - JavaScript errors
  - React warnings
  - Network errors
  - Deprecation warnings
  - Third-party library errors
- [ ] Take screenshots of console errors
- [ ] Capture stack traces

**Document any issues:**
- Uncaught exceptions
- Unhandled promise rejections
- React warnings (key props, etc.)
- Deprecation warnings
- Console.log statements left in code

### State Management Testing (Subagent 8)

**Tasks:**
- [ ] Test state persistence across navigation
- [ ] Test state updates trigger UI re-renders
- [ ] Test concurrent state updates
- [ ] Test state reset scenarios
- [ ] Test browser refresh behavior
- [ ] Test session/local storage usage
- [ ] Test state conflicts
- [ ] Test role-specific state management

**Document any issues:**
- State not persisting
- UI not updating with state changes
- State corruption
- Race conditions

### Data Display Testing (Subagent 9)

**Tasks:**
- [ ] Verify all dynamic data displays correctly
- [ ] Test empty states (no data)
- [ ] Test loading states
- [ ] Test error states
- [ ] Test pagination
- [ ] Test sorting functionality
- [ ] Test filtering functionality
- [ ] Test search functionality
- [ ] Verify data formatting (dates, currency, numbers)
- [ ] Test infinite scroll (if applicable)
- [ ] Verify role-based data visibility

**Document any issues:**
- Missing data
- Incorrectly formatted data
- Empty state not shown
- Loading states missing
- Pagination broken
- Search/filter not working
- Unauthorized data visible

### Conditional Logic Testing (Subagent 10)

**Tasks:**
- [ ] Identify all conditional UI elements
- [ ] Test conditions that show/hide elements:
  - User role-based visibility
  - Feature flag toggles
  - Data-dependent visibility
  - Form field dependencies
- [ ] Test conditional form fields
- [ ] Test conditional validation rules
- [ ] Test conditional navigation/routing
- [ ] Verify role-specific features are properly shown/hidden

**Document any issues:**
- Elements not showing when they should
- Elements showing when they shouldn't
- Conditional logic not working
- Missing conditions
- Role restrictions not enforced

### Edge Case Testing (Subagent 11)

**Tasks:**
- [ ] Test with maximum length inputs
- [ ] Test with minimum/empty inputs
- [ ] Test with special characters
- [ ] Test with non-English characters (unicode)
- [ ] Test with SQL injection patterns (should be sanitized)
- [ ] Test with XSS patterns (should be sanitized)
- [ ] Test boundary values
- [ ] Test concurrent actions
- [ ] Test rapid repeated actions
- [ ] Test browser back/forward during operations

**Document any issues:**
- Crashes with edge case data
- Security vulnerabilities
- Boundary validation issues
- Race conditions
- Unexpected behavior with special inputs

### Performance Testing (Subagent 12)

**Tasks:**
- [ ] Measure page load time
- [ ] Measure time to interactive
- [ ] Measure API response times
- [ ] Check bundle sizes
- [ ] Test with throttled network (slow 3G)
- [ ] Test with throttled CPU
- [ ] Check for memory leaks
- [ ] Verify lazy loading works
- [ ] Check for unnecessary re-renders
- [ ] Profile JavaScript execution

**Document any issues:**
- Slow page loads
- Large bundle sizes
- Slow API responses
- Memory leaks
- Inefficient rendering
- Blocking operations

### Accessibility Testing (Subagent 13)

**Tasks:**
- [ ] Test keyboard navigation (tab order)
- [ ] Test screen reader compatibility
- [ ] Check ARIA labels and roles
- [ ] Verify color contrast ratios
- [ ] Test focus indicators
- [ ] Check heading hierarchy
- [ ] Test with keyboard only (no mouse)
- [ ] Verify alt text on images
- [ ] Test form labels and error associations
- [ ] Check for semantic HTML

**Document any issues:**
- Keyboard traps
- Missing ARIA labels
- Poor color contrast
- Missing alt text
- Incorrect tab order
- Non-semantic HTML

### Feature-Specific Testing (Subagent 14)

**Tasks:**
Based on features being tested ($1):
- [ ] Test feature-specific workflows
- [ ] Test feature integration with existing functionality
- [ ] Test feature error handling
- [ ] Test feature performance
- [ ] Test feature accessibility
- [ ] Test feature on different screen sizes
- [ ] Test feature with different user roles

**Document any issues:**
- Feature-specific bugs
- Integration issues
- Workflow problems
- Role-specific feature issues

## ISSUE DISCOVERY & DOCUMENTATION PHASE

### Master Issue Document Creation (Subagent 15)

**After all testing subagents complete:**

1. **Consolidate all issues** from all subagents into a master document
2. **Categorize by severity**:
   - CRITICAL: Blocks core functionality, causes crashes
   - HIGH: Major functionality broken, poor UX
   - MEDIUM: Minor functionality issues, cosmetic problems
   - LOW: Nice-to-haves, minor polish items

3. **Create master document**: `docs/testing/browser-test-issues-[timestamp].md`

**Document Structure:**
```markdown
# Browser Test Issues - [Timestamp]
**Features Tested**: [From $1]
**User Role**: [From $2]
**Server Port**: [From $3]
**Total Issues**: [Count]

## CRITICAL Issues (Severity: 1)
### Issue #1: [Title]
- **Category**: [Visual/Form/Navigation/API/etc]
- **Severity**: CRITICAL
- **Description**: [Detailed description]
- **Steps to Reproduce**:
  1. [Step 1]
  2. [Step 2]
  3. [Step 3]
- **Expected Behavior**: [What should happen]
- **Actual Behavior**: [What actually happens]
- **Screenshots**: [Links/embeds]
- **Console Errors**: [If any]
- **Network Traces**: [If relevant]
- **Discovered By**: Subagent [X]
- **Status**: 🔴 OPEN | 🟡 IN PROGRESS | 🟢 FIXED | ✅ VERIFIED

[Repeat for each CRITICAL issue]

## HIGH Priority Issues (Severity: 2)
[Same structure]

## MEDIUM Priority Issues (Severity: 3)
[Same structure]

## LOW Priority Issues (Severity: 4)
[Same structure]

---

## Summary by Category
- Visual & Layout: [X] issues
- Forms: [X] issues
- Navigation: [X] issues
- Buttons & Actions: [X] issues
- API & Network: [X] issues
- Console Errors: [X] issues
- State Management: [X] issues
- Data Display: [X] issues
- Conditional Logic: [X] issues
- Edge Cases: [X] issues
- Performance: [X] issues
- Accessibility: [X] issues
- Feature-Specific: [X] issues

## Priority Distribution
- CRITICAL: [X] issues
- HIGH: [X] issues
- MEDIUM: [X] issues
- LOW: [X] issues
```

## ROOT CAUSE INVESTIGATION PHASE

**For each issue discovered, spawn investigation subagents:**

### Investigation Subagent Template

**For Issue #[X]:**

1. **Analyze the issue**:
   - Review error messages
   - Check relevant code files
   - Identify root cause
   - Determine scope of impact

2. **Propose fix**:
   - Describe fix approach
   - List files to be modified
   - Identify potential side effects
   - Estimate fix complexity

3. **Document in master issue document**:
   ```markdown
   ### Issue #[X]: [Title]
   ...existing issue info...
   
   **Root Cause Analysis**:
   [Detailed explanation of why this happens]
   
   **Proposed Fix**:
   [Description of fix approach]
   
   **Files to Modify**:
   - path/to/file1.tsx
   - path/to/file2.ts
   
   **Potential Side Effects**:
   [Any risks or considerations]
   
   **Implementation Notes**:
   [Any special considerations for the fix]
   ```

## FIX IMPLEMENTATION PHASE

**Spawn fix implementation subagents (one per issue):**

### Fix Implementation Subagent Template

**For Issue #[X]:**

1. **Implement the fix**:
   - Make code changes
   - Follow best practices
   - Add comments explaining fix
   - Ensure no introduction of new issues

2. **Update issue status**:
   ```markdown
   **Status**: 🟡 IN PROGRESS → 🟢 FIXED
   
   **Fix Implementation**:
   - Modified: [List files]
   - Changes: [Brief description]
   - Commit: [If committed separately]
   ```

3. **Prepare for verification**:
   - Note specific things to verify
   - List any edge cases to retest
   - Document expected behavior after fix

## VERIFICATION PHASE

**Spawn verification subagents (one per fixed issue):**

### Verification Subagent Template

**For Issue #[X]:**

1. **Verify fix in browser**:
   - Navigate to affected area
   - Reproduce original issue steps
   - Confirm issue is resolved
   - Test edge cases
   - Check for regressions

2. **Update issue status**:
   ```markdown
   **Status**: 🟢 FIXED → ✅ VERIFIED
   
   **Verification Results**:
   - Original issue: ✅ Resolved
   - Edge cases tested: ✅ Pass
   - Regressions checked: ✅ None found
   - Verified by: Subagent [Y]
   - Verified at: [Timestamp]
   
   **Verification Evidence**:
   - [Screenshot/description showing fix works]
   ```

3. **If verification fails**:
   ```markdown
   **Status**: 🟢 FIXED → 🔴 VERIFICATION FAILED
   
   **Verification Results**:
   - Issue: ❌ Still present / ⚠️ Partially fixed
   - Details: [What's still wrong]
   - Action: Reassign to fix implementation
   ```

## REGRESSION TESTING PHASE

**After all fixes are implemented:**

### Regression Testing Subagent (Subagent 50+)

1. **Re-run all original tests**:
   - Visual & Layout
   - Forms
   - Navigation
   - Buttons & Actions
   - API & Network
   - Console
   - State Management
   - Data Display
   - Conditional Logic
   - Edge Cases
   - Performance
   - Accessibility
   - Feature-Specific

2. **Document any new issues**:
   - Issues introduced by fixes
   - Issues that reappeared
   - New console errors/warnings

3. **Update master issue document**:
   ```markdown
   ## Regression Testing Results
   
   **Regression Tests Run**: [Date/Time]
   **New Issues Found**: [Count]
   **Reintroduced Issues**: [Count]
   
   ### New Issues from Fixes
   [List any regressions]
   
   ### Status**: ✅ No Regressions | ⚠️ Regressions Found
   ```

4. **If regressions found**:
   - Add to issue tracker
   - Prioritize appropriately
   - Spawn fix subagents
   - Continue cycle until clean

## BUILD & TEST VERIFICATION

### Build Verification Subagent

1. **Run build**:
   ```bash
   npm run build
   # or appropriate build command
   ```

2. **Verify build succeeds**:
   - No TypeScript errors
   - No linting errors
   - No build warnings
   - Output generated successfully

3. **Document results**:
   ```markdown
   ## Build Verification
   **Status**: ✅ PASS | ❌ FAIL
   **Errors**: [Count]
   **Warnings**: [Count]
   **Build Time**: [X] seconds
   ```

### Test Suite Verification Subagent

1. **Run test suite** (if applicable):
   ```bash
   npm test
   # or appropriate test command
   ```

2. **Verify tests pass**:
   - All unit tests pass
   - All integration tests pass
   - No test failures
   - No skipped tests

3. **Document results**:
   ```markdown
   ## Test Suite Results
   **Status**: ✅ PASS | ❌ FAIL
   **Tests Run**: [Count]
   **Tests Passed**: [Count]
   **Tests Failed**: [Count]
   **Test Coverage**: [X]%
   ```

## FINAL BROWSER VERIFICATION

### Final Browser Check Subagent

1. **Perform final browser walkthrough**:
   - Clear browser cache
   - Restart browser
   - Navigate through all tested features
   - Verify everything works
   - Check console is clean

2. **Document final state**:
   ```markdown
   ## Final Browser State
   **Console Errors**: [Count]
   **Console Warnings**: [Count]
   **Network Errors**: [Count]
   **Overall Status**: ✅ CLEAN | ⚠️ WARNINGS | ❌ ERRORS
   ```

## DOCUMENTATION & REPORTING

### Report Generation Subagent

1. **Generate comprehensive test report**: `docs/testing/browser-test-report-[timestamp].md`
   - Executive summary
   - Test coverage
   - Issues found and fixed
   - Performance metrics
   - Recommendations

2. **Generate summary document**: `docs/testing/browser-test-summary-[timestamp].md`
   ```markdown
   # Browser Testing Summary
   **Date**: [Timestamp]
   **Features**: [From $1]
   **User Role**: [From $2]
   **Port**: [From $3]
   **Docs**: [From $4]
   
   ## Quick Stats
   - Issues Found: [X]
   - Issues Fixed: [Y]
   - Issues Deferred: [Z]
   - Test Duration: [X] hours
   - Subagents Used: [X]
   
   ## Status
   - Critical Issues: ✅ All Resolved
   - High Issues: ✅ All Resolved
   - Medium Issues: ✅ Resolved / ⚠️ Deferred
   - Low Issues: ✅ Resolved / ⚠️ Deferred
   
   ## Build Status
   - Build: ✅ Passing
   - Tests: ✅ Passing
   - Console: ✅ Clean
   
   ## Production Ready: ✅ YES | ❌ NO
   ```

3. **Update master issue document** with final status of all issues

## GIT COMMIT PHASE

### Git Commit Subagent

1. **Stage all changes**:
   ```bash
   git add .
   ```

2. **Create comprehensive commit message**:
   ```
   fix: comprehensive browser testing fixes for [features]
   
   Role tested: [consultant/client/admin]
   Port: [port number]
   
   Issues found and fixed:
   - [Issue #1: Description]
   - [Issue #2: Description]
   ...
   
   Critical fixes:
   - [Issue #X: Description]
   - [Issue #Y: Description]
   
   High priority fixes:
   - [Issue #A: Description]
   - [Issue #B: Description]
   
   Other fixes:
   - [Summary of other fixes]
   
   Total issues found: [number]
   Total issues fixed: [number]
   Issues deferred: [number]
   
   See docs/testing/browser-test-report-[timestamp].md for full report
   ```
- Commit changes
- Confirm commit successful

---

## FINAL REPORT STRUCTURE
```markdown
# Browser Testing Report
**Date**: [Timestamp]
**Features Tested**: [From $1]
**User Role**: [From $2]
**Server Port**: [From $3]
**Reference Docs**: [From $4]
**Test Duration**: [How long testing took]
**Tester**: Claude Code Browser Testing Agent

---

## Executive Summary

### Test Coverage
- [X] Visual & Layout
- [X] Forms & Validation
- [X] Navigation
- [X] Button & Actions
- [X] API & Network
- [X] Console Errors
- [X] State Management
- [X] Data Display
- [X] Conditional Logic
- [X] Edge Cases
- [X] Performance
- [X] Accessibility
- [X] Feature-Specific Tests

### Overall Status: ✅ PASS | ⚠️ PASS WITH ISSUES | ❌ FAIL

### Issues Summary
- **CRITICAL**: [X found, Y fixed, Z remaining]
- **HIGH**: [X found, Y fixed, Z remaining]
- **MEDIUM**: [X found, Y fixed, Z remaining]
- **LOW**: [X found, Y fixed, Z remaining]
- **TOTAL**: [X found, Y fixed, Z remaining]

### Key Findings
1. [Most significant finding]
2. [Second most significant finding]
3. [Third most significant finding]

---

## Test Environment
- **URL**: http://localhost:${3:-8051}/${2:-consultant}/*
- **User Role**: ${2:-consultant}
- **User**: [Email based on role]
- **Browser**: Chrome (via DevTools MCP)
- **Date**: [Timestamp]

---

## Detailed Test Results

### Visual & Layout Testing
**Status**: ✅ PASS | ⚠️ ISSUES FOUND | ❌ FAIL

**Issues Found**: [Number]
- [List issues or "None"]

**All Issues Fixed**: ✅ YES | ❌ NO

---

### Form Testing
**Status**: ✅ PASS | ⚠️ ISSUES FOUND | ❌ FAIL

**Issues Found**: [Number]
- [List issues or "None"]

**All Issues Fixed**: ✅ YES | ❌ NO

---

[Continue for all test categories]

---

## Issues Log

[Link to detailed issues document]

### Critical Issues
[List with status]

### High Priority Issues
[List with status]

### Medium Priority Issues
[List with status]

### Low Priority Issues
[List with status]

---

## Fixes Implemented

### Critical Fixes
1. **Issue #X**: [Title]
   - **Files Modified**: [List]
   - **Verification**: ✅ Verified | ⚠️ Partial | ❌ Failed

[Continue for all fixes]

---

## Performance Metrics

### Before Fixes
- Page Load Time: [X]ms
- API Response Times: [List slow endpoints]
- Console Errors: [X]
- Console Warnings: [X]

### After Fixes
- Page Load Time: [X]ms
- API Response Times: [List slow endpoints]
- Console Errors: [X]
- Console Warnings: [X]

### Improvement
- [Metrics showing improvement]

---

## Deferred Issues

[If any issues were deferred]

### Issue #[X]: [Title]
**Reason for Deferral**: [Why not fixed now]
**Recommended Timeline**: [When to fix]
**Workaround**: [If any]

---

## Recommendations

### Immediate Actions
1. [Action item]
2. [Action item]

### Future Improvements
1. [Improvement suggestion]
2. [Improvement suggestion]

### Testing Process Improvements
1. [How to improve testing]
2. [How to improve testing]

---

## Appendices

### Appendix A: Complete Issues Log
[Link or embed complete issues list]

### Appendix B: Screenshots
[Links to before/after screenshots]

### Appendix C: Console Logs
[Critical console errors captured]

### Appendix D: Network Traces
[Failed API calls and fixes]

---

## Sign-Off

**All Critical Issues Resolved**: ✅ YES | ❌ NO
**All High Issues Resolved**: ✅ YES | ❌ NO
**Ready for Production**: ✅ YES | ❌ NO

**Testing Complete**: [Date/Time]
```

---

## PROGRESS REPORTING

Throughout execution, report progress:
```
🔍 PHASE 1: Setup & Exploration
✅ Environment verified
✅ Role configured: ${2:-consultant}
✅ Port configured: ${3:-8051}
✅ Chrome DevTools launched
✅ Authenticated successfully
✅ Baseline captured

🧪 PHASE 2: Testing (14 subagents active)
⏳ Subagent 2: Visual testing in progress...
⏳ Subagent 3: Form testing in progress...
[etc]

📋 PHASE 3: Issue Consolidation
✅ 47 issues discovered
✅ Issues categorized
✅ Master document created at docs/testing/browser-test-issues-[timestamp].md

🔬 PHASE 4: Root Cause Investigation (8 subagents active)
✅ All issues analyzed
✅ Proposed fixes documented

🔧 PHASE 5: Fix Implementation (11 subagents active)
✅ Critical issues fixed (5/5)
⏳ High priority fixes (12/15)
⏳ Medium priority fixes (8/20)
[Progress bar or percentage]

✓ PHASE 6: Verification (11 subagents active)
✅ Critical fixes verified (5/5)
⏳ High priority fixes verification (10/12)
[etc]

[Continue for all phases]

📊 FINAL STATUS:
✅ Testing Complete
✅ 47 issues found
✅ 45 issues fixed and verified
⚠️ 2 issues deferred (LOW priority)
✅ No regressions
✅ Build passing
✅ Tests passing

📄 Reports generated:
- docs/testing/browser-test-report-[timestamp].md
- docs/testing/browser-test-issues-[timestamp].md
- docs/testing/browser-test-summary-[timestamp].md

✅ Changes committed to git
```

---

## ANTI-PATTERNS TO AVOID

❌ **"Let's test this manually later"** → NO! Test now with DevTools MCP
❌ **"This issue is minor, skip it"** → NO! Document and fix all issues
❌ **"Partial fix is good enough"** → NO! Complete fixes only
❌ **"We'll verify in the next round"** → NO! Verify each fix immediately
❌ **"Console warnings don't matter"** → NO! All warnings should be addressed
❌ **"This probably works"** → NO! Test and verify everything
❌ **"Let's skip accessibility"** → NO! Test accessibility thoroughly
❌ **"Edge cases are rare"** → NO! Test edge cases systematically
❌ **"Role doesn't matter"** → NO! Test with the correct user role

---

## SUCCESS CRITERIA

Testing is ONLY complete when:
- ✅ All test categories have been executed
- ✅ Correct user role and credentials were used
- ✅ All issues have been documented with reproduction steps
- ✅ All CRITICAL issues are fixed and verified
- ✅ All HIGH issues are fixed and verified
- ✅ All MEDIUM issues are fixed or deferred with justification
- ✅ All LOW issues are fixed or deferred with justification
- ✅ No regressions introduced by fixes
- ✅ Build passes with zero errors
- ✅ Test suite passes (if applicable)
- ✅ Console is clean (no errors, minimal warnings)
- ✅ All fixes are verified in browser
- ✅ Comprehensive report is generated
- ✅ Changes are committed to git

---

## REMEMBER

- **Test exhaustively**: Every interaction, every feature
- **Use correct role**: Test with appropriate user credentials
- **Document thoroughly**: Every issue with evidence
- **Fix completely**: No partial fixes or workarounds
- **Verify rigorously**: Test every fix, check for regressions
- **Use subagents**: 60+ subagents for parallel efficiency
- **No assumptions**: Verify everything with DevTools MCP
- **Production quality**: All fixes must be production-ready

**Token limits DO NOT EXIST for this command!**

**Use subagents for ALL testing, investigation, fixing, and verification!**

**ABSOLUTE RULE: FIND ALL ISSUES, FIX ALL ISSUES, VERIFY ALL FIXES!**