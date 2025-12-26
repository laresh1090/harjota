---
argument-hint: <report> [start-phase]
description: Implement features from a phased implementation plan
allowed-tools: Task, Read, Glob, Bash, Write, Edit, MultiEdit
---

I need to implement features following the detailed implementation plans.

**Report/Plan**: $1
**Starting Phase**: ${2:-1}

## CRITICAL CODE QUALITY RULES

**ZERO TOLERANCE POLICY - NO EXCEPTIONS:**

1. **NO PLACEHOLDER CODE**: 
   - ❌ NEVER use TODO, FIXME, PLACEHOLDER, or similar comments
   - ❌ NEVER use stub implementations (e.g., `return null`, `throw new Error('Not implemented')`)
   - ❌ NEVER leave empty function bodies unless explicitly specified in the plan for future phases
   - ✅ ALL functions must be fully implemented and functional
   - ✅ If a feature is planned for a future phase, do NOT create stub code—omit it entirely until that phase

2. **COMPLETE IMPLEMENTATIONS ONLY**:
   - Every function must have complete, working logic
   - Every API endpoint must be fully implemented with proper error handling
   - Every UI component must be fully functional with all interactions working
   - Every database query must be production-ready
   - Every validation rule must be implemented

3. **NO SHORTCUTS**:
   - Do not skip error handling ("will add later")
   - Do not skip input validation ("will add later")
   - Do not skip edge cases ("will handle later")
   - Do not defer integration points ("will connect later")
   - Do not create "temporary" implementations

4. **PRODUCTION-READY CODE ONLY**:
   - All code must be ready for production deployment
   - All code must include proper error handling and logging
   - All code must handle edge cases and boundary conditions
   - All code must be fully tested (write actual tests, not test stubs)
   - All code must follow security best practices

5. **TOKEN LIMITS ARE IRRELEVANT**:
   - Do NOT factor in token usage when implementing
   - Do NOT factor in session limits when implementing
   - Complete the implementation fully, regardless of complexity
   - Use as many subagent calls as needed to complete the work
   - Break large implementations into focused subagent tasks, but ensure each piece is complete

6. **INTEGRATION COMPLETENESS**:
   - All API integrations must be fully connected
   - All database operations must be complete with transactions where needed
   - All frontend-backend connections must work end-to-end
   - All third-party service integrations must be functional
   - All authentication/authorization must be properly implemented

7. **CONDITIONAL LOGIC REQUIREMENTS**:
   - All conditional logic must be fully implemented (no "basic version for now")
   - All validation rules must be complete
   - All business logic must be production-ready
   - All state management must handle all states and transitions

## VERIFICATION CHECKLIST

Before marking any phase complete, verify:
- [ ] Zero TODO/FIXME/PLACEHOLDER comments exist
- [ ] Zero stub functions exist
- [ ] All error handling is implemented
- [ ] All validation is implemented
- [ ] All edge cases are handled
- [ ] All integrations are connected and working
- [ ] All tests are written and passing
- [ ] Code builds without errors or warnings
- [ ] All functionality works end-to-end
- [ ] Code is production-ready

## SUBAGENT TASK GUIDELINES

When delegating to subagents, include these instructions:
- "Implement this COMPLETELY with ZERO placeholders or TODOs"
- "All functions must be fully functional—no stubs allowed"
- "Include complete error handling and validation"
- "Production-ready code only—no shortcuts"
- "Do not consider token limits—complete the implementation fully"

## WORKFLOW

1. **Locate and read the master index**:
   - If $1 is a file path, read it directly using a subagent
   - If $1 is a feature name or search term, use subagent to Glob and Read to find the matching plan file in docs/plans/
   - The master status report should be in docs/plans/ directory
   - **IMPORTANT**: Use subagent to explore and understand the plan thoroughly

2. **Start from phase ${2:-1}** (default to phase 1 if not specified)

3. **Implement one phase at a time using parallel subagents**:
   - **IMPORTANT**: Use multiple parallel subagents whenever possible for efficiency
   - Delegate implementation tasks to specialized subagents using the Task tool
   - **CRITICAL**: Instruct each subagent to follow the ZERO TOLERANCE code quality rules
   - Each subagent must deliver complete, production-ready code
   - Break large features into focused subagent tasks (e.g., frontend component, backend API, database layer)
   - Run subagents in parallel when tasks are independent

4. **After implementation, use a subagent for comprehensive review**:
   - **IMPORTANT**: Delegate review and testing to a dedicated review subagent
   - Use review-plan command: /review-plan <plan file path or plan details> <completed phase> (IMPORTANT)
   - Review subagent must verify ZERO placeholders/TODOs exist
   - Review subagent must verify all functionality is complete
   - Review subagent must test all features end-to-end
   - Review subagent must check for completeness and errors

5. **If issues are found**:
   - **IMPORTANT**: Use subagents to comprehensively address ALL issues
   - Create focused subagent tasks for each issue category:
     - Build/compilation errors → subagent
     - Linting issues → subagent
     - Test failures → subagent
     - Integration problems → subagent
     - Missing functionality → subagent
   - Do NOT proceed until ALL issues are resolved
   - Re-run review subagent after fixes to confirm resolution

6. **Quality gate check** (MANDATORY before proceeding):
   - Run build: must pass with zero errors
   - Run linter: must pass with zero errors (warnings acceptable only if pre-existing)
   - Run tests: must pass with 100% success rate
   - Manual verification: test critical user flows
   - Code review: verify zero TODOs/placeholders exist
   - **GATE**: Phase cannot be marked complete until all checks pass

7. **Commit unstaged files after each phase**:
   - Use subagent to commit with descriptive message
   - Command: `git add -A && git commit -m "Phase X: [detailed description of what was implemented]"`
   - Commit message must describe WHAT was implemented, not just the phase number
   - Example: "Phase 2: Implement conditional logic engine with rule builder UI and validation"

8. **Show progress**: Keep me informed of what you're doing at each step
   - Report which subagents are working on which tasks
   - Show completion percentage
   - Highlight any challenges encountered and how they were resolved
   - Summarize what was implemented in each phase

9. **Ask for confirmation**: Wait for my approval before moving to the next phase
   - Present summary of completed work
   - Show test results and verification status
   - Confirm all quality gates passed
   - Request explicit approval to proceed

10. **IMPORTANT: Use subagents for ALL tasks**:
    - Build fixes → subagent
    - Documentation updates → subagent
    - Linting corrections → subagent
    - Testing → subagent
    - Backend/frontend integration issues → subagent
    - URL and navigation fixes → subagent
    - Explorations and investigations → subagent
    - Git commits → subagent
    - Code reviews → subagent
    - Feature implementations → parallel subagents
    - Bug fixes → subagent

## SUBAGENT EFFICIENCY STRATEGIES

1. **Parallel execution patterns**:
   - Frontend + Backend + Database = 3 parallel subagents
   - Multiple independent components = parallel subagents per component
   - Tests + Documentation + Linting = 3 parallel subagents
   - Bug fixes in different modules = parallel subagents per module

2. **Sequential dependencies**:
   - Only wait for subagent completion when there's a dependency
   - Example: Database schema must complete before backend API
   - Example: Backend API must complete before frontend integration
   - Otherwise, maximize parallelization

3. **Batching strategies**:
   - Group related small tasks into single subagent
   - Don't create subagent for trivial single-line changes
   - Balance subagent overhead vs. parallelization benefit

## ANTI-PATTERNS TO AVOID

❌ **"Let's implement the basic version first"** → NO! Implement it completely
❌ **"I'll add error handling in the next phase"** → NO! Add it now
❌ **"This is good enough for now"** → NO! Make it production-ready
❌ **"We can optimize this later"** → NO! Write quality code from the start
❌ **"Let me add a TODO to remember"** → NO! Either implement it or document it in the plan
❌ **"This stub will work temporarily"** → NO! Implement the real functionality
❌ **"We're running out of tokens"** → IRRELEVANT! Complete the implementation
❌ **"Let's skip tests for now"** → NO! Write complete tests

## SUCCESS CRITERIA

A phase is ONLY complete when:
✅ All planned features are fully implemented
✅ Zero TODOs, FIXMEs, or placeholders exist
✅ All tests are written and passing
✅ Code builds without errors
✅ All integrations are working end-to-end
✅ Code review confirms production-readiness
✅ Quality gates all pass
✅ Changes are committed to git

## REMEMBER

- **Quality over speed**: Take the time to implement features correctly
- **Complete over partial**: Better to fully implement fewer features than partially implement many
- **Working over placeholder**: Every line of code must serve a functional purpose
- **Production-ready over prototype**: All code must be deployment-ready
- **Subagents are unlimited**: Use as many as needed to maintain quality and speed
- **Token limits don't exist**: Implement fully regardless of complexity

**Use subagents (IMPORTANT) to read (explore) plan files - DO NOT read them without subagents!**

**Use subagents (IMPORTANT) for ALL tasks!**

**Remember: Maximize parallelization with subagents and always delegate reviews, explorations/investigations, commits and fixes to subagents.**

**ABSOLUTE RULE: NO PLACEHOLDERS, NO STUBS, NO TODOs - PRODUCTION-READY CODE ONLY!**