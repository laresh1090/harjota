---
argument-hint: <report> [start-phase]
description: Review and test features from implementation plans with zero-tolerance quality standards
allowed-tools: Task, Read, Glob, Bash, Write, Edit, MultiEdit, Grep
---

I need to review and test features for errors/issues and completeness following the detailed implementation plans.

**Report/Plan**: $1
**Starting Phase**: ${2:-1}

## CRITICAL REVIEW STANDARDS

**ZERO TOLERANCE POLICY - NO EXCEPTIONS:**

1. **PLACEHOLDER DETECTION**:
   - ❌ Flag ALL TODO, FIXME, PLACEHOLDER, HACK, XXX comments
   - ❌ Flag stub implementations (`return null`, `throw new Error('Not implemented')`)
   - ❌ Flag empty function bodies (unless intentionally empty by design)
   - ❌ Flag commented-out code blocks
   - ❌ Flag console.log/debug statements left in production code
   - ✅ Every flagged item must be either implemented or removed

2. **FUNCTIONALITY COMPLETENESS**:
   - Every function must have working logic
   - Every API endpoint must be fully implemented
   - Every UI component must be interactive and functional
   - Every form must have complete validation
   - Every conditional branch must be implemented
   - Every error handler must properly handle errors

3. **INTEGRATION VERIFICATION**:
   - Backend-Frontend contract compliance (request/response structure)
   - Database query correctness and efficiency
   - API endpoint connectivity and data flow
   - State management consistency
   - Navigation flow integrity
   - Authentication/authorization enforcement

4. **ERROR HANDLING & EDGE CASES**:
   - All error scenarios must have handlers
   - All edge cases must be addressed
   - All input validation must be present
   - All boundary conditions must be tested
   - All race conditions must be prevented

5. **PRODUCTION READINESS**:
   - No security vulnerabilities
   - No performance bottlenecks
   - No memory leaks
   - No broken links or navigation
   - No hardcoded test data in production code

## COMPREHENSIVE REVIEW CHECKLIST

### Code Quality
- [ ] Zero TODO/FIXME/PLACEHOLDER/HACK comments
- [ ] Zero stub functions or incomplete implementations
- [ ] Zero console.log or debug statements
- [ ] Zero commented-out code blocks
- [ ] All functions have complete implementations
- [ ] All error handling is present and correct
- [ ] All input validation is implemented
- [ ] Code follows consistent style and conventions

### Backend Review
- [ ] All API endpoints are implemented
- [ ] Request/response DTOs match frontend expectations
- [ ] Database queries are optimized and use proper indexes
- [ ] Transactions are used where needed
- [ ] Authentication/authorization is enforced
- [ ] Error responses follow consistent format
- [ ] Business logic is complete and correct
- [ ] No N+1 query problems
- [ ] Proper logging is implemented
- [ ] Rate limiting is in place where needed

### Frontend Review
- [ ] Components render correctly with all data
- [ ] All user interactions work as expected
- [ ] Forms have complete validation (client-side)
- [ ] Error states are displayed properly
- [ ] Loading states are shown during async operations
- [ ] Navigation URLs are correct and working
- [ ] Button/anchor href attributes are valid
- [ ] API request payloads match backend expectations
- [ ] API response handling matches backend format
- [ ] State management is consistent
- [ ] Responsive design works across breakpoints
- [ ] Accessibility standards are met

### Integration Testing
- [ ] Frontend successfully calls backend APIs
- [ ] Request payloads match backend expectations
- [ ] Response data matches frontend expectations
- [ ] Error responses are properly handled
- [ ] Authentication flows work end-to-end
- [ ] File uploads/downloads work correctly
- [ ] Real-time features (if any) function properly
- [ ] Third-party integrations are working

### Data Flow Verification
- [ ] User input → validation → API call → backend processing → database → response → UI update
- [ ] Error propagation from backend to frontend UI
- [ ] State updates trigger appropriate UI re-renders
- [ ] No data transformation mismatches in the pipeline

### URL & Navigation
- [ ] All navigation links use correct paths
- [ ] No broken anchor/button hrefs
- [ ] Dynamic routes are properly constructed
- [ ] Query parameters are correctly formatted
- [ ] Route guards/middleware work correctly
- [ ] 404 handling is implemented
- [ ] Redirects work as expected

### Security Review
- [ ] No exposed secrets or API keys
- [ ] SQL injection prevention
- [ ] XSS prevention
- [ ] CSRF protection
- [ ] Proper input sanitization
- [ ] Authentication token handling
- [ ] Authorization checks on all protected resources

### Testing Coverage
- [ ] Unit tests exist and pass
- [ ] Integration tests exist and pass
- [ ] E2E tests exist and pass (if applicable)
- [ ] Edge cases are tested
- [ ] Error scenarios are tested
- [ ] Test coverage meets standards (>80%)

## WORKFLOW

1. **Locate and read the master index**:
   - If $1 is a file path, read it directly using a subagent
   - If $1 is a feature name or search term, use subagent to Glob and Read to find the matching plan file in docs/plans/
   - The master status report should be in docs/plans/ directory
   - **IMPORTANT**: Use subagent to explore and understand the plan thoroughly

2. **Review all phases starting from phase ${2:-1}** (default to phase 1 if not specified)
   - Use superpowers:code-reviewer (IMPORTANT)
   - Apply ZERO TOLERANCE quality standards

3. **Review one phase at a time using parallel subagents**:
   - **IMPORTANT**: Use multiple parallel subagents whenever possible for efficiency
   - Delegate review tasks to specialized subagents using the Task tool
   - Assign focused review areas to each subagent:
     - Subagent 1: Backend API review
     - Subagent 2: Frontend component review
     - Subagent 3: Integration & data flow review
     - Subagent 4: Security & error handling review
     - Subagent 5: Testing & quality assurance
     - Subagent 6: Documentation & code cleanliness

4. **Focus on these specific review areas** (CRITICAL):

   **A. Backend-Frontend Contract Mismatches**:
   - Response structure differences (field names, nesting, data types)
   - Request payload differences (missing fields, wrong field names)
   - Date/time format inconsistencies
   - Enum value mismatches
   - Pagination structure differences
   - Error response format differences

   **B. Placeholder & Incomplete Code**:
   - TODO/FIXME/PLACEHOLDER comments
   - Stub functions (`return null`, `throw new Error()`)
   - Empty function bodies
   - Commented-out code blocks
   - Mock/dummy data in production code
   - Temporary workarounds
   - Debug code (console.log, debugger statements)

   **C. Navigation & URL Errors**:
   - Malformed URLs in anchors/buttons
   - Incorrect route paths
   - Missing leading/trailing slashes
   - Hardcoded URLs that should be dynamic
   - Broken query parameter construction
   - Invalid href attributes
   - Route parameter mismatches

   **D. Data Flow Issues**:
   - Missing data transformations
   - Incorrect data mapping
   - State not updating properly
   - Props not passed correctly
   - Event handlers not connected

   **E. Error Handling Gaps**:
   - Missing try-catch blocks
   - Unhandled promise rejections
   - No error boundaries (React)
   - Missing validation on inputs
   - No fallback UI for errors
   - Errors not logged properly

   **F. Business Logic Issues**:
   - Incomplete conditional logic
   - Missing edge case handling
   - Incorrect calculations
   - Wrong validation rules
   - Logic not matching requirements

5. **After review, categorize and prioritize issues**:
   - **CRITICAL**: Breaks functionality, security issues, data loss risks
   - **HIGH**: Major bugs, significant UX issues, performance problems
   - **MEDIUM**: Minor bugs, inconsistencies, code quality issues
   - **LOW**: Style issues, minor optimizations, documentation gaps

6. **Use subagents to fix ALL issues**:
   - **IMPORTANT**: Delegate comprehensive fixes to specialized subagents
   - Create focused fix tasks for parallel execution:
     - Backend fixes → dedicated subagent
     - Frontend fixes → dedicated subagent
     - Integration fixes → dedicated subagent
     - Test fixes → dedicated subagent
     - Documentation updates → dedicated subagent
   - Address all CRITICAL and HIGH issues immediately
   - Address MEDIUM and LOW issues before moving to next phase
   - Each fix must be complete—no partial fixes
   - Fixes must not introduce new issues

7. **Verify fixes with additional subagent**:
   - **IMPORTANT**: Use fresh review subagent to verify all fixes
   - Re-run all tests after fixes
   - Verify no regressions were introduced
   - Confirm all issues from original review are resolved
   - Use superpowers:code-reviewer for final verification

8. **Run comprehensive validation**:
   - Build the project: must succeed with zero errors
   - Run linter: must pass with zero errors
   - Run all tests: must pass 100%
   - Manual smoke test: verify critical paths work
   - Check git diff: ensure only intended changes

9. **Commit all unstaged files after fixes**:
   - Use subagent to commit with detailed message
   - Command: `git add -A && git commit -m "Review Phase X: [detailed description of fixes]"`
   - Commit message must list what was fixed:
     - Example: "Review Phase 2: Fix backend-frontend contract mismatches, remove placeholder code, correct navigation URLs, add missing error handlers"
   - Only commit if fixes were made

10. **Show progress**: Keep me informed of what you're doing at each step
    - Report review findings with severity levels
    - Show which subagents are fixing which issues
    - Display test results after fixes
    - Highlight any complex issues requiring attention
    - Provide metrics: issues found vs. issues fixed

11. **Automatically proceed**: Move to the next phase when current phase is complete
    - Confirm all issues are resolved
    - Confirm all tests pass
    - Confirm build succeeds
    - Provide phase completion summary
    - Begin next phase review

12. **IMPORTANT: Use subagents for ALL tasks**:
    - Build verification → subagent
    - Documentation updates → subagent
    - Linting corrections → subagent
    - Testing → subagent
    - Backend/frontend integration fixes → subagent
    - URL and navigation fixes → subagent
    - Explorations and investigations → subagent
    - Git commits → subagent
    - Code reviews → subagent
    - Issue categorization → subagent
    - Fix verification → subagent

## SUBAGENT REVIEW STRATEGIES

1. **Parallel Review Pattern**:
   - Backend review subagent (APIs, database, business logic)
   - Frontend review subagent (components, state, UI)
   - Integration review subagent (contracts, data flow)
   - Security review subagent (auth, validation, vulnerabilities)
   - Quality review subagent (tests, documentation, style)
   - Run all 5 in parallel for maximum efficiency

2. **Deep Dive Reviews**:
   - For complex features, assign dedicated subagent for thorough analysis
   - Focus on one critical area at a time
   - Trace complete data flow from UI to database and back

3. **Cross-Reference Reviews**:
   - Compare backend API definitions with frontend API calls
   - Compare database schemas with backend queries
   - Compare UI mockups/designs with implemented components

## TOOLS TO USE

- **Grep/Search**: Find TODOs, placeholders, console.logs, hardcoded values
- **Bash**: Run build, tests, linters
- **Read**: Review implementation files against plan specifications
- **Glob**: Find all files related to a feature for comprehensive review
- **Task**: Delegate specialized reviews to subagents

## ISSUE REPORTING FORMAT

For each issue found, report:
```
**Issue #X: [Brief Description]**
- Severity: CRITICAL | HIGH | MEDIUM | LOW
- Location: [file:line]
- Problem: [What's wrong]
- Impact: [What breaks or doesn't work]
- Expected: [What should happen]
- Fix Required: [What needs to be done]
```

## ANTI-PATTERNS TO CATCH

❌ **"This will be implemented later"** → Flag as incomplete
❌ **"Quick hack to make it work"** → Flag as needs proper fix
❌ **"Good enough for now"** → Flag as not production-ready
❌ **"Tests can wait"** → Flag as missing tests
❌ **"Works on my machine"** → Flag as environment-specific issue
❌ **"I'll document this tomorrow"** → Flag as missing documentation
❌ **"The error case is unlikely"** → Flag as missing error handling
❌ **"Frontend can handle the validation"** → Flag as missing backend validation

## SUCCESS CRITERIA

A phase review is ONLY complete when:
✅ All code is reviewed against implementation plan
✅ Zero TODOs, FIXMEs, or placeholders exist
✅ All backend-frontend contracts match perfectly
✅ All navigation URLs are correct and working
✅ All error handling is complete
✅ All tests are passing (100%)
✅ Build succeeds with zero errors
✅ No critical or high-severity issues remain
✅ All fixes are verified by second review
✅ Changes are committed to git

## REMEMBER

- **Thorough over fast**: Take time to find all issues
- **Critical first**: Address breaking issues immediately
- **Complete fixes**: No partial or temporary solutions
- **Verify everything**: Test after every fix
- **Parallel execution**: Use multiple subagents simultaneously
- **Production mindset**: Code must be deployment-ready after review

**Use subagents (IMPORTANT) to read (explore) plan files - DO NOT read them without subagents!**

**Use subagents (IMPORTANT) for ALL tasks!**

**Remember: Maximize parallelization with subagents and always delegate reviews, explorations/investigations, commits and fixes to subagents.**

**ABSOLUTE RULE: FIND AND FIX ALL ISSUES - NOTHING INCOMPLETE PASSES REVIEW!**