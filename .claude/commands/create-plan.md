---
argument-hint: <project-or-topic-name>
description: Strategic planning orchestrator using superpowers:brainstorm skill with subagent-driven exploration, creating detailed multi-phase plans in organized folder structure with master index
allowed-tools: Task, Read, Glob, Bash, Write, Edit, MultiEdit, Grep
---

# STRATEGIC PLANNING ORCHESTRATOR

**Project/Topic**: $1
**Execution Mode**: Use `superpowers:brainstorm` skill with enhanced organization
**Output Directory**: `planning-$1-[YYYYMMDD-HHMMSS]`

---

## CRITICAL REQUIREMENTS

### 🎯 MANDATORY EXECUTION RULES

1. **USE SUPERPOWERS:BRAINSTORM SKILL**:
   - ✅ ALWAYS invoke the `superpowers:brainstorm` skill as the primary planning engine
   - ✅ Let the skill handle question generation, phase creation, and exploration
   - ✅ Do NOT create your own questions or phases - use what the skill provides
   - ✅ The skill knows what questions to ask and how to structure planning

2. **MANDATORY SUBAGENT USAGE**:
   - ✅ ALL explorations MUST use dedicated subagents (as directed by brainstorm skill)
   - ✅ ALL investigations MUST use dedicated subagents
   - ✅ ALL plan writing MUST use dedicated subagents
   - ✅ NEVER write plans or conduct research in main thread
   - ✅ Each subagent focuses on ONE specific aspect or phase

3. **MULTI-FILE DETAILED PLANNING**:
   - ✅ Split plans into multiple files (one per phase/major section)
   - ✅ Each file must be VERY detailed and comprehensive (500-2000 lines)
   - ✅ NO single monolithic plan files
   - ✅ Create separate files for each logical component

4. **PHASED APPROACH**:
   - ✅ Use phases as defined by the brainstorm skill
   - ✅ Each phase builds on previous phases
   - ✅ Clear dependencies between phases
   - ✅ Detailed timelines and milestones per phase

5. **ORGANIZED FOLDER STRUCTURE**:
   - ✅ ALL files in ONE descriptive timestamped folder
   - ✅ Master index file (00-MASTER-INDEX.md) linking all content
   - ✅ Clear naming conventions (numbered prefixes)
   - ✅ Logical file organization by phase/category

6. **INTERACTIVE QUESTIONING** (from brainstorm skill):
   - ✅ Ask questions ONE AT A TIME (as provided by skill)
   - ✅ Provide recommendations/suggestions for each question
   - ✅ Use multi-option selection format when possible
   - ✅ Wait for user response before proceeding

---

## EXECUTION WORKFLOW

### STEP 1: Initialize Brainstorm Session

**Action**: Invoke the `superpowers:brainstorm` skill

```
Use the superpowers:brainstorm skill to create a comprehensive plan for: $1

CRITICAL INSTRUCTIONS FOR BRAINSTORM EXECUTION:
- Ask questions ONE AT A TIME
- Provide a recommendation or suggestion for EACH question
- Use multi-option format (arrow key selection) whenever possible
- Use subagents for ALL explorations and investigations
- Use subagents for ALL plan writing
- Split the final plan into multiple detailed files
- Organize everything into phases
```

**Expected Behavior**:
- Brainstorm skill will begin asking discovery questions
- Questions will be presented one at a time
- Each question should include a recommendation
- Multi-option format should be used when applicable

---

### STEP 2: Respond to Discovery Questions

**During Questioning Phase**:

**Multi-Option Question Format** (preferred when applicable):
```
❓ QUESTION: [Question from brainstorm skill]

💡 RECOMMENDATION: [Suggested answer/approach]

Please select an option:
→ Option 1: [Description]
→ Option 2: [Description]
→ Option 3: [Description]
→ Custom: [Let me specify]

Use arrow keys ↑↓ to navigate, ENTER to select
```

**Open Question Format** (when multi-option doesn't fit):
```
❓ QUESTION: [Question from brainstorm skill]

💡 RECOMMENDATION: [Suggested answer/approach]

Your response:
```

**Key Rules**:
- Wait for user response to each question
- Acknowledge and record each response
- Don't skip ahead or ask multiple questions at once
- Build context from previous answers

---

### STEP 3: Subagent-Driven Exploration

**Once Discovery Complete**:

The brainstorm skill will identify areas for exploration. For EACH area:

**Spawn Dedicated Subagent**:
```
Subagent [X]: [Topic Area]
Task: Explore and document [specific aspect]
Output: [YY-filename.md] in planning folder
Requirements:
- Comprehensive and detailed (500-2000 lines)
- Include research, analysis, recommendations
- Use examples, templates, frameworks
- Consider risks, opportunities, constraints
```

**Examples of Exploration Subagents**:
- Subagent 1: Context & Background Research
- Subagent 2: Stakeholder Analysis
- Subagent 3: Resource Assessment
- Subagent 4: Risk Analysis
- Subagent 5: Market Research
- Subagent 6: Technical Feasibility
- Subagent 7: Financial Modeling
- [As many as needed based on brainstorm skill's analysis]

**Critical Rule**: NEVER do exploration in main thread - always use subagents

---

### STEP 4: Phase-Based Plan Writing

**For Each Phase Identified by Brainstorm Skill**:

**Spawn Dedicated Plan Writing Subagent**:
```
Subagent [X]: Phase [N] Detailed Plan
Task: Write comprehensive plan for Phase [N]
Output: [NN-phase-N-plan.md] in planning folder
Requirements:
- Very detailed (500-2000 lines minimum)
- Include:
  - Objectives and goals
  - Detailed activities and tasks
  - Resource allocation
  - Timeline with milestones
  - Deliverables and acceptance criteria
  - Dependencies on previous phases
  - Risk mitigation strategies
  - Success metrics
  - Tools and technologies needed
  - Team roles and responsibilities
```

**Examples**:
- Subagent 15: Phase 1 Detailed Plan (Discovery & Planning)
- Subagent 16: Phase 2 Detailed Plan (Foundation & Setup)
- Subagent 17: Phase 3 Detailed Plan (Core Implementation)
- Subagent 18: Phase 4 Detailed Plan (Testing & Refinement)
- Subagent 19: Phase 5 Detailed Plan (Launch & Scaling)
- [Additional phases as needed]

**Critical Rule**: NEVER write plans in main thread - always use subagents

---

### STEP 5: Organized Folder Structure

**Create Timestamped Project Folder**:
```
planning-$1-[YYYYMMDD-HHMMSS]/
├── 00-MASTER-INDEX.md                    (Master index linking everything)
├── 01-project-overview.md                (High-level summary)
├── 02-discovery-responses.md             (All Q&A captured)
│
├── [EXPLORATION SECTION]
├── 10-context-research.md                (Subagent output)
├── 11-stakeholder-analysis.md            (Subagent output)
├── 12-resource-assessment.md             (Subagent output)
├── 13-risk-analysis.md                   (Subagent output)
├── 14-market-research.md                 (Subagent output)
├── 15-technical-feasibility.md           (Subagent output)
├── 16-financial-analysis.md              (Subagent output)
├── [... more exploration files]
│
├── [STRATEGIC PLANNING SECTION]
├── 30-vision-mission.md                  (Subagent output)
├── 31-strategic-objectives.md            (Subagent output)
├── 32-success-metrics.md                 (Subagent output)
├── [... more strategic files]
│
├── [PHASE PLANS SECTION]
├── 50-phase1-detailed-plan.md            (Subagent output - VERY detailed)
├── 51-phase2-detailed-plan.md            (Subagent output - VERY detailed)
├── 52-phase3-detailed-plan.md            (Subagent output - VERY detailed)
├── 53-phase4-detailed-plan.md            (Subagent output - VERY detailed)
├── [... more phase files]
│
├── [EXECUTION SUPPORT SECTION]
├── 70-team-structure.md                  (Subagent output)
├── 71-communication-plan.md              (Subagent output)
├── 72-risk-management.md                 (Subagent output)
├── 73-quality-assurance.md               (Subagent output)
├── 74-budget-financial-plan.md           (Subagent output)
├── [... more execution support files]
│
└── 99-appendices/                        (Supporting materials)
    ├── templates/
    ├── examples/
    └── references/
```

**Naming Convention**:
- `00-09`: Master index and overview
- `10-29`: Exploration and analysis
- `30-49`: Strategic planning
- `50-69`: Phase-specific plans
- `70-89`: Execution support
- `90-99`: Appendices and references

---

### STEP 6: Create Master Index File

**Subagent Task: Master Index Creation**

Create `00-MASTER-INDEX.md` that ties everything together:

```markdown
# Master Planning Index: $1
**Created**: [Timestamp]
**Last Updated**: [Timestamp]
**Status**: [In Progress / Complete]

---

## Quick Navigation

- [Project Overview](#project-overview)
- [Discovery Responses](#discovery-responses)
- [Exploration & Analysis](#exploration--analysis)
- [Strategic Planning](#strategic-planning)
- [Phase-by-Phase Plans](#phase-by-phase-plans)
- [Execution Support](#execution-support)
- [Appendices](#appendices)

---

## Project Overview

**[Link to: 01-project-overview.md]**

[2-3 sentence executive summary]

**Key Objectives**:
- [Objective 1]
- [Objective 2]
- [Objective 3]

**Timeline**: [Overall timeline]
**Budget**: [Overall budget]
**Team Size**: [Team size]

---

## Discovery Responses

**[Link to: 02-discovery-responses.md]**

Complete record of all discovery questions and responses.

**Key Insights**:
- [Insight 1]
- [Insight 2]
- [Insight 3]

---

## Exploration & Analysis

Comprehensive research and analysis across all critical dimensions.

### Research & Context
- **[Link to: 10-context-research.md]** - Industry trends, best practices, case studies
- **[Link to: 14-market-research.md]** - Market analysis, competitive landscape

### Organizational Analysis
- **[Link to: 11-stakeholder-analysis.md]** - Stakeholder mapping and engagement
- **[Link to: 12-resource-assessment.md]** - Capabilities, gaps, readiness

### Risk & Feasibility
- **[Link to: 13-risk-analysis.md]** - Comprehensive risk assessment
- **[Link to: 15-technical-feasibility.md]** - Technical evaluation
- **[Link to: 16-financial-analysis.md]** - Financial modeling and projections

[... continue for all exploration files]

---

## Strategic Planning

Core strategic documents defining vision, goals, and success criteria.

- **[Link to: 30-vision-mission.md]** - Vision, mission, values, positioning
- **[Link to: 31-strategic-objectives.md]** - SMART objectives, OKRs, goal hierarchy
- **[Link to: 32-success-metrics.md]** - KPI framework, measurement methodology

[... continue for all strategic files]

---

## Phase-by-Phase Plans

Detailed implementation plans for each phase (500-2000 lines each).

### Phase 1: [Phase Name]
**[Link to: 50-phase1-detailed-plan.md]**
- **Duration**: [Timeline]
- **Key Deliverables**: [List]
- **Dependencies**: [None / Prerequisites]
- **Status**: [Not Started / In Progress / Complete]

### Phase 2: [Phase Name]
**[Link to: 51-phase2-detailed-plan.md]**
- **Duration**: [Timeline]
- **Key Deliverables**: [List]
- **Dependencies**: Phase 1 completion
- **Status**: [Not Started / In Progress / Complete]

### Phase 3: [Phase Name]
**[Link to: 52-phase3-detailed-plan.md]**
- **Duration**: [Timeline]
- **Key Deliverables**: [List]
- **Dependencies**: Phase 2 completion
- **Status**: [Not Started / In Progress / Complete]

[... continue for all phases]

---

## Execution Support

Supporting plans for successful execution.

- **[Link to: 70-team-structure.md]** - Org structure, roles, RACI
- **[Link to: 71-communication-plan.md]** - Stakeholder comms, meetings, reporting
- **[Link to: 72-risk-management.md]** - Risk register, mitigation, contingency
- **[Link to: 73-quality-assurance.md]** - Quality standards, testing, reviews
- **[Link to: 74-budget-financial-plan.md]** - Detailed budget, cash flow, tracking

[... continue for all execution files]

---

## Appendices

- **[Link to: 99-appendices/templates/]** - Document templates and formats
- **[Link to: 99-appendices/examples/]** - Examples and case studies
- **[Link to: 99-appendices/references/]** - Reference materials and research

---

## Phase Dependencies

```
Phase 1 → Phase 2 → Phase 3 → Phase 4 → Phase 5
   ↓         ↓         ↓         ↓         ↓
[Details] [Details] [Details] [Details] [Details]
```

---

## Document Status

| File | Status | Last Updated | Owner |
|------|--------|--------------|-------|
| 01-project-overview.md | ✅ Complete | [Date] | [Name] |
| 02-discovery-responses.md | ✅ Complete | [Date] | [Name] |
| ... | ... | ... | ... |

---

## Revision History

| Date | Version | Changes | Author |
|------|---------|---------|--------|
| [Date] | 1.0 | Initial creation | Claude |
| [Date] | 1.1 | [Updates] | [Name] |

```

---

## QUALITY STANDARDS

### For Each Plan File

**Minimum Requirements**:
- ✅ 500-2000 lines of detailed content
- ✅ Clear structure with headers and sections
- ✅ Specific, actionable items (not high-level vague statements)
- ✅ Examples, templates, and frameworks included
- ✅ Risks and mitigation strategies
- ✅ Success criteria and acceptance criteria
- ✅ Dependencies clearly identified
- ✅ Timeline with specific milestones
- ✅ Resource requirements specified

**Content Depth**:
- Strategic level: Vision, objectives, approach
- Tactical level: Specific activities, tasks, workflows
- Operational level: Day-to-day execution details
- Supporting level: Templates, checklists, examples

---

## SUCCESS CRITERIA

Planning session is ONLY complete when:

- ✅ Superpowers:brainstorm skill was used throughout
- ✅ All discovery questions asked one at a time
- ✅ Recommendations provided for each question
- ✅ Multi-option selection used when possible
- ✅ ALL explorations done via subagents
- ✅ ALL investigations done via subagents
- ✅ ALL plan writing done via subagents
- ✅ Plans split into multiple detailed files (not monolithic)
- ✅ Each file is comprehensive (500-2000 lines)
- ✅ Clear phases with dependencies identified
- ✅ All files in one timestamped folder
- ✅ Master index file created and links all content
- ✅ Clear naming conventions used (numbered prefixes)
- ✅ Folder structure is logical and navigable

---

## ANTI-PATTERNS TO AVOID

❌ **Creating your own questions** → Use brainstorm skill's questions
❌ **Creating your own phases** → Use brainstorm skill's phase structure
❌ **Doing exploration in main thread** → Always use subagents
❌ **Doing investigation in main thread** → Always use subagents
❌ **Writing plans in main thread** → Always use subagents
❌ **Single monolithic plan file** → Split into multiple files
❌ **Shallow plans (<500 lines)** → Make them detailed and comprehensive
❌ **All files in root directory** → Use timestamped project folder
❌ **No master index** → MUST create master index
❌ **Random file naming** → Use numbered prefixes
❌ **Asking multiple questions at once** → One question at a time
❌ **Not providing recommendations** → Always suggest an answer
❌ **Not using multi-option format** → Use when applicable

---

## REMEMBER

- **Let brainstorm skill lead**: It knows what questions to ask and how to structure planning
- **Subagents for everything**: Exploration, investigation, plan writing - ALL via subagents
- **Split into many files**: One comprehensive file per phase/major topic
- **Organize systematically**: Timestamped folder with numbered files and master index
- **One question at a time**: Interactive discovery with recommendations
- **Multi-option when possible**: Make it easy for users to respond
- **Detail is king**: Each file should be 500-2000 lines of comprehensive content
- **Master index is mandatory**: Ties everything together

**The brainstorm skill is your planning engine. Your job is to ensure proper execution, organization, and subagent usage.**