---
argument-hint: <feature-description>
description: Autonomous feature planning - explores codebase, researches solutions, creates detailed multi-phase plans in organized folder with master index
allowed-tools: Task, Read, Glob, Bash, Write, Edit, MultiEdit, Grep
---

# AUTONOMOUS FEATURE PLANNER: $1

**Output**: `feature-plan-$1-[YYYYMMDD-HHMMSS]/`

## EXECUTION RULES

**Autonomous**: Zero user interaction. Make decisions via codebase exploration + web research.

**Subagents**: ALL tasks via dedicated subagents (exploration, research, writing). One subagent = one file.

**Detail**: Phase plans 500-2000 lines each with code examples, specifics, not generic guidance.

**Organization**: All files in timestamped folder with numbered prefixes, master index linking everything.

---

## WORKFLOW

### 1. Codebase Exploration (Subagents 1-20)

Map project comprehensively via 20 subagents analyzing:
- Project structure, tech stack, frontend/backend architecture
- Database schemas, API endpoints, auth/security
- UI patterns, state management, testing setup
- Config, integrations, error handling, performance
- Deployment, code standards, business logic, a11y
- Documentation, dependencies

Output: `01-20-[topic].md` per subagent

### 2. Requirements Analysis (Subagents 21-25)

Autonomously define:
- Feature scope, functional/non-functional requirements
- User stories, use cases, acceptance criteria  
- Data requirements, entity relationships
- Integration points in existing codebase
- Success metrics, KPIs, monitoring needs

Output: `21-25-[topic].md`

### 3. Research & Innovation (Subagents 26-35)

Use web_search extensively to research:
- Industry best practices, case studies, proven approaches
- Modern tech/frameworks, emerging solutions
- UX/UI patterns, design inspiration, interactions
- Architecture patterns, scalability, SOLID principles
- Security (OWASP, auth patterns), compliance
- Performance optimization, caching, CDN strategies
- Testing strategies, TDD, test pyramid
- Accessibility (WCAG), screen readers, ARIA
- API design (REST, GraphQL), versioning
- Developer experience, tooling, debugging

Output: `26-35-[topic].md`

### 4. Architecture & Design (Subagents 36-45)

Design comprehensive solution:
- High-level architecture diagram, component structure, data flow
- Database design: ERD, tables, indexes, migrations
- API specification: endpoints, schemas, validation, errors
- Frontend components: hierarchy, props, state
- State management: structure, actions, selectors
- Business logic: rules, validations, workflows
- Security: auth flows, authorization, encryption
- Testing strategy: unit, integration, e2e plans
- Performance: caching, optimization, monitoring
- Error handling: boundaries, logging, alerts

Output: `36-45-[topic].md`

### 5. Implementation Phase Plans (Subagents 46-59)

Create 14 detailed phase plans (500-2000 lines EACH):

**Phase 1**: Foundation - DB, API scaffolding, setup  
**Phase 2**: Core Backend - Services, business logic, validation  
**Phase 3**: Frontend Foundation - Components, routing, state  
**Phase 4**: UI Components - Forms, interactions, validation  
**Phase 5**: Integration - Frontend-backend data flow  
**Phase 6**: Polish - Animations, micro-interactions, UX  
**Phase 7**: Testing - Unit, integration, e2e, QA  
**Phase 8**: Documentation - Code docs, API docs, guides  
**Phase 9**: Performance - Optimization, profiling, caching  
**Phase 10**: Security - Audit, hardening, vulnerability fixes  
**Phase 11**: Deployment Prep - CI/CD, infrastructure, configs  
**Phase 12**: Rollout - Staged deployment, monitoring  
**Phase 13**: Post-Launch - Monitoring, feedback, iteration  
**Phase 14**: Scaling - Optimization at scale, auto-scaling  

Each plan includes:
- Day-by-day task breakdown with hour estimates
- Code examples (not just descriptions)
- Specific files to create/modify
- Testing checklist per task
- Dependencies, risks, mitigation
- Success criteria per deliverable

Output: `46-59-phase-N-[name]-plan.md` (500-2000 lines each!)

**Subagent 60**: Comprehensive risk management plan

### 6. Supporting Docs (Subagents 61-70)

Generate:
- Code examples/templates for all patterns
- Complete DB migration scripts
- API request/response examples (cURL, Postman)
- Test code examples (unit, integration, e2e)
- Configuration/environment setup guides
- Troubleshooting guide (common issues, solutions)
- Developer onboarding guide
- End-user documentation
- Monitoring/alerting setup
- Maintenance/support plan

Output: `61-70-[topic].md`

### 7. Master Index (Subagent 71)

Create `00-MASTER-INDEX.md`:
- Executive summary (objectives, timeline, team size, risks)
- Navigation links to all files organized by category
- Phase dependencies diagram
- Timeline overview (Gantt-style)
- Resource requirements, estimated costs
- Success criteria, KPIs with targets
- Document status table
- Quick reference for team

---

## FOLDER STRUCTURE

```
feature-plan-$1-[YYYYMMDD-HHMMSS]/
├── 00-MASTER-INDEX.md
├── 01-20-[codebase-exploration].md
├── 21-25-[requirements].md
├── 26-35-[research].md
├── 36-45-[architecture-design].md
├── 46-59-[phase-N-implementation].md (500-2000 lines each!)
├── 60-[risk-management].md
└── 61-70-[supporting-docs].md
```

---

## SUCCESS CRITERIA

✅ 71 subagents executed (one per file)  
✅ Codebase thoroughly explored  
✅ Extensive research via web_search  
✅ Phase plans 500-2000 lines with code examples  
✅ Master index comprehensive  
✅ Zero user interaction  
✅ All files in timestamped folder

---

## ANTI-PATTERNS

❌ Asking user questions  
❌ Generic plans without codebase specifics  
❌ Short plans (<500 lines)  
❌ Working in main thread  
❌ Skipping research  
❌ Missing master index