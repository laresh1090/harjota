---
argument-hint: <microservice-path-or-url> [output-report-path]
description: Explore microservice and current project, then create comprehensive integration plan
allowed-tools: Task, Read, Glob, Bash, Write, Edit, MultiEdit, Grep
---

I need to explore a microservice and the current project, then create a detailed integration plan.

**Microservice**: $1 (path to microservice directory or URL to documentation)
**Output Report**: ${2:-docs/plans/microservice-integration-$(date +%Y-%m-%d).md}

## CRITICAL EXPLORATION STANDARDS

**ZERO ASSUMPTIONS POLICY - COMPLETE EXPLORATION REQUIRED:**

1. **EXHAUSTIVE DISCOVERY**:
   - ❌ NEVER assume anything about the microservice or project
   - ❌ NEVER skip reading any relevant files
   - ❌ NEVER make educated guesses about implementations
   - ✅ READ every configuration file
   - ✅ EXPLORE every API endpoint definition
   - ✅ ANALYZE every model, schema, and DTO
   - ✅ EXAMINE every controller and service
   - ✅ REVIEW all documentation files

2. **TOKEN LIMITS ARE IRRELEVANT**:
   - Do NOT consider token usage during exploration
   - Do NOT skip files due to token concerns
   - Use as many subagents as needed for complete exploration
   - Break exploration into focused subagent tasks if needed
   - Complete the exploration fully, regardless of complexity

3. **COMPREHENSIVE DOCUMENTATION**:
   - Document EVERYTHING discovered
   - Include exact file paths, line numbers for critical code
   - Capture complete API contracts (request/response examples)
   - List all dependencies and their versions
   - Map out complete architecture and data flow

4. **VERIFICATION REQUIREMENTS**:
   - Cross-reference documentation with actual implementation
   - Verify API endpoints actually exist in code
   - Confirm authentication mechanisms are implemented
   - Validate data models match API responses
   - Test example requests (if possible) to verify behavior

## MICROSERVICE EXPLORATION CHECKLIST

### Phase 1: Infrastructure & Tech Stack Discovery

**Use parallel subagents for each category:**

#### Subagent 1: Technology Stack Analysis
- [ ] Programming language(s) and version(s)
- [ ] Framework(s) and version(s) (Express, FastAPI, Spring Boot, etc.)
- [ ] Runtime environment (Node.js, Python, Java, .NET, etc.)
- [ ] Package manager (npm, pip, Maven, NuGet, etc.)
- [ ] Build tools and scripts
- [ ] Dependency list with versions
- [ ] Development vs. production dependencies

**Files to examine:**
- `package.json`, `package-lock.json`
- `requirements.txt`, `Pipfile`, `poetry.lock`
- `pom.xml`, `build.gradle`
- `*.csproj`, `packages.config`
- `Gemfile`, `Gemfile.lock`
- `go.mod`, `go.sum`
- `composer.json`
- Any other dependency management files

#### Subagent 2: Configuration & Environment
- [ ] Configuration file formats (JSON, YAML, ENV, etc.)
- [ ] Environment variables required
- [ ] Configuration management approach
- [ ] Feature flags or toggles
- [ ] Multi-environment support (dev, staging, prod)
- [ ] Secrets management approach

**Files to examine:**
- `.env`, `.env.example`, `.env.template`
- `config/`, `configuration/` directories
- `appsettings.json`, `application.properties`, `application.yml`
- `config.js`, `config.py`, `settings.py`
- Docker configurations
- Kubernetes manifests

#### Subagent 3: Database & Data Storage
- [ ] Database type(s) (PostgreSQL, MySQL, MongoDB, Redis, etc.)
- [ ] ORM/ODM used (Prisma, TypeORM, SQLAlchemy, Mongoose, etc.)
- [ ] Database schemas and models
- [ ] Migration files and history
- [ ] Data seeding approach
- [ ] Connection pooling configuration
- [ ] Caching layer (Redis, Memcached, etc.)

**Files to examine:**
- `prisma/schema.prisma`, `typeorm/`, `sequelize/`
- `models/`, `entities/`, `schemas/`
- `migrations/`, `alembic/`, `flyway/`
- Database connection configuration files
- `seeds/`, `fixtures/` directories

#### Subagent 4: Authentication & Authorization
- [ ] Authentication mechanism (JWT, OAuth, API keys, session-based)
- [ ] Token format and structure
- [ ] Token expiration and refresh logic
- [ ] Authorization approach (RBAC, ABAC, claims-based)
- [ ] Supported identity providers
- [ ] Security middleware implementation
- [ ] CORS configuration
- [ ] Rate limiting implementation

**Files to examine:**
- `auth/`, `authentication/`, `authorization/` directories
- Middleware files
- Security configuration files
- Token generation/validation logic
- Permission/role definitions

### Phase 2: API Exploration

**Use parallel subagents for different API aspects:**

#### Subagent 5: API Documentation Review
- [ ] OpenAPI/Swagger specifications
- [ ] Postman collections
- [ ] API documentation files (README, DOCS)
- [ ] API versioning strategy
- [ ] Base URLs and route prefixes
- [ ] Global middleware and interceptors

**Files to examine:**
- `swagger.json`, `openapi.yaml`, `api-spec.yml`
- `*.postman_collection.json`
- `docs/api/`, `documentation/`
- API gateway configurations
- Route definition files

#### Subagent 6: Endpoint Inventory
For EACH endpoint discovered, document:
- [ ] HTTP method (GET, POST, PUT, PATCH, DELETE)
- [ ] Full path/route
- [ ] Route parameters (path, query, body)
- [ ] Request headers required
- [ ] Request body schema (with examples)
- [ ] Response status codes
- [ ] Response body schema (with examples)
- [ ] Error response formats
- [ ] Authentication requirements
- [ ] Authorization/permission requirements
- [ ] Rate limiting rules
- [ ] Pagination approach (if applicable)
- [ ] Filtering/sorting capabilities
- [ ] File upload handling (if applicable)

**Files to examine:**
- `routes/`, `controllers/`, `handlers/` directories
- `api/`, `endpoints/` directories
- Route configuration files
- Controller implementation files
- Service layer files

#### Subagent 7: Data Models & DTOs
For EACH model/DTO, document:
- [ ] Model/entity name
- [ ] Field names and types
- [ ] Required vs. optional fields
- [ ] Validation rules
- [ ] Default values
- [ ] Relationships to other models
- [ ] Computed/virtual fields
- [ ] Serialization format
- [ ] Transformation logic

**Files to examine:**
- `models/`, `entities/`, `domain/`
- `dto/`, `schemas/`, `types/`
- `validators/`, `validation/`
- `serializers/`, `transformers/`

#### Subagent 8: Business Logic & Features
- [ ] Core features provided
- [ ] Feature-specific services
- [ ] Business rules and validation
- [ ] Workflow implementations
- [ ] External service integrations
- [ ] Event handling/publishing
- [ ] Background jobs/queue processing
- [ ] Scheduled tasks/cron jobs

**Files to examine:**
- `services/`, `business/`, `domain/`
- `features/`, `modules/`
- `workers/`, `jobs/`, `tasks/`
- `events/`, `listeners/`, `handlers/`
- Integration directories

### Phase 3: Integration Capabilities

**Use parallel subagents for different integration types:**

#### Subagent 9: Embed Options - Widgets
- [ ] Available widget types
- [ ] Widget initialization code
- [ ] Required JavaScript libraries
- [ ] CSS dependencies
- [ ] Configuration options
- [ ] Event callbacks
- [ ] Data binding approach
- [ ] Responsive behavior
- [ ] Browser compatibility
- [ ] CDN links for assets

**Files to examine:**
- `widgets/`, `embeds/`, `components/`
- `public/`, `dist/`, `build/`
- Widget documentation
- Example HTML files
- JavaScript SDK files

#### Subagent 10: Embed Options - IFRAMEs
- [ ] IFRAME embed URLs
- [ ] URL parameters supported
- [ ] PostMessage API usage
- [ ] Parent-child communication protocol
- [ ] Height/width handling (responsive?)
- [ ] Security considerations (CSP, X-Frame-Options)
- [ ] Styling/theming options
- [ ] Event notifications to parent

**Files to examine:**
- IFRAME-specific routes
- PostMessage handler code
- Embed documentation
- Example embed HTML

#### Subagent 11: SDK/Client Libraries
- [ ] Official SDKs available (languages)
- [ ] SDK installation instructions
- [ ] SDK initialization requirements
- [ ] SDK method documentation
- [ ] Type definitions (TypeScript, etc.)
- [ ] SDK examples and usage

**Files to examine:**
- `sdk/`, `client/`, `lib/`
- SDK documentation
- Type definition files (`.d.ts`)
- Example projects using SDK

#### Subagent 12: Webhooks & Events
- [ ] Webhook endpoints for registration
- [ ] Event types available
- [ ] Webhook payload structure
- [ ] Retry logic and failure handling
- [ ] Webhook signature verification
- [ ] Event filtering options

**Files to examine:**
- `webhooks/`, `events/` directories
- Webhook handler code
- Event documentation

#### Subagent 13: Real-time Capabilities
- [ ] WebSocket support
- [ ] Server-Sent Events (SSE)
- [ ] Real-time protocols (Socket.IO, etc.)
- [ ] Connection authentication
- [ ] Channel/room structure
- [ ] Message formats
- [ ] Presence/status tracking

**Files to examine:**
- WebSocket server code
- Real-time handler files
- Socket connection logic

### Phase 4: Deployment & Operations

#### Subagent 14: Deployment Architecture
- [ ] Containerization (Docker, Kubernetes)
- [ ] Hosting requirements
- [ ] Reverse proxy configuration
- [ ] Load balancing setup
- [ ] Static asset hosting
- [ ] CDN usage
- [ ] Health check endpoints
- [ ] Metrics/monitoring endpoints

**Files to examine:**
- `Dockerfile`, `docker-compose.yml`
- Kubernetes manifests (`k8s/`, `*.yaml`)
- CI/CD configurations (`.github/`, `.gitlab-ci.yml`)
- Nginx/Apache configurations
- Health check route implementations

#### Subagent 15: Logging & Monitoring
- [ ] Logging framework used
- [ ] Log levels and formats
- [ ] Structured logging support
- [ ] Error tracking integration
- [ ] Performance monitoring
- [ ] APM integration points

**Files to examine:**
- Logging configuration
- Monitoring setup files
- Error tracking integrations

## CURRENT PROJECT EXPLORATION CHECKLIST

**Use parallel subagents for each category:**

### Phase 5: Current Project Analysis

#### Subagent 16: Project Tech Stack
- [ ] Programming language(s) and versions
- [ ] Framework(s) and versions
- [ ] Build tools and scripts
- [ ] Dependency list
- [ ] Package manager
- [ ] Runtime environment

**Files to examine:**
- All dependency management files
- Build configuration files
- Runtime configuration

#### Subagent 17: Project Architecture
- [ ] Architectural pattern (MVC, microservices, serverless, etc.)
- [ ] Frontend framework (React, Vue, Angular, etc.)
- [ ] Backend framework
- [ ] Database(s) used
- [ ] State management approach
- [ ] Routing structure
- [ ] API layer architecture

**Files to examine:**
- `src/`, `app/`, `lib/` directories
- Architecture documentation
- Project README files
- System design documents

#### Subagent 18: Existing API Layer
- [ ] Current API endpoints
- [ ] API client implementations
- [ ] HTTP client library used (axios, fetch, etc.)
- [ ] API authentication approach
- [ ] Error handling patterns
- [ ] Request/response interceptors

**Files to examine:**
- `api/`, `services/`, `client/` directories
- HTTP client configuration
- API service files

#### Subagent 19: Authentication System
- [ ] Current authentication mechanism
- [ ] Session/token storage
- [ ] User context management
- [ ] Protected route implementation
- [ ] Permission/role system

**Files to examine:**
- `auth/`, `authentication/` directories
- Route guards/middleware
- User context providers
- Auth service implementations

#### Subagent 20: UI/UX Components
- [ ] Component library used (Material-UI, Ant Design, custom, etc.)
- [ ] Styling approach (CSS Modules, Styled Components, Tailwind, etc.)
- [ ] Layout structure
- [ ] Navigation system
- [ ] Form handling approach
- [ ] Modal/dialog patterns
- [ ] Toast/notification system

**Files to examine:**
- `components/`, `ui/` directories
- Styling files
- Layout components
- Shared component library

#### Subagent 21: Data Management
- [ ] State management library (Redux, MobX, Context, etc.)
- [ ] Data fetching approach (React Query, SWR, custom)
- [ ] Form management library
- [ ] Validation approach
- [ ] Caching strategy

**Files to examine:**
- State management files
- Data fetching hooks/services
- Form components
- Store/context definitions

#### Subagent 22: Existing Features
- [ ] Complete feature list
- [ ] Feature organization structure
- [ ] User flows implemented
- [ ] Integration points in current features

**Files to examine:**
- Feature directories
- Route definitions
- User flow documentation
- Feature documentation in `docs/`

#### Subagent 23: Documentation & Plans
- [ ] Architecture documentation
- [ ] API documentation
- [ ] Feature specifications
- [ ] Integration guides
- [ ] Implementation plans
- [ ] Status reports

**Files to examine:**
- `docs/`, `documentation/` directories
- `docs/plans/` directory
- README files
- Wiki or markdown docs
- Confluence/Notion export (if available)

#### Subagent 24: Configuration & Environment
- [ ] Environment variables used
- [ ] Configuration management
- [ ] API base URLs
- [ ] Feature flags
- [ ] Build-time vs runtime config

**Files to examine:**
- `.env`, configuration files
- Environment-specific configs
- Config management code

#### Subagent 25: Testing Infrastructure
- [ ] Testing frameworks used
- [ ] Test coverage
- [ ] Testing patterns
- [ ] Mock/stub approaches
- [ ] E2E testing setup

**Files to examine:**
- Test files (`*.test.js`, `*.spec.ts`, etc.)
- Testing configuration
- Test utilities
- Mock data files

## INTEGRATION ANALYSIS & PLANNING

### Phase 6: Gap Analysis

**Use subagents for different analysis areas:**

#### Subagent 26: Technical Compatibility Analysis
Analyze and document:
- [ ] Language/runtime compatibility
- [ ] Framework version compatibility
- [ ] API communication compatibility (REST, GraphQL, gRPC)
- [ ] Authentication mechanism compatibility
- [ ] Data format compatibility (JSON, XML, Protocol Buffers)
- [ ] Network requirements (CORS, proxies, VPNs)
- [ ] Security requirements alignment
- [ ] Performance considerations

**Output format:**
```markdown
## Technical Compatibility

### Compatible Areas
- [List everything that's compatible]

### Incompatibilities & Resolutions
- **Issue**: [Describe incompatibility]
  - **Impact**: [What this affects]
  - **Resolution**: [How to resolve]
  
### Additional Requirements
- [List any new dependencies, tools, or configurations needed]
```

#### Subagent 27: Feature Alignment Analysis
Analyze and document:
- [ ] Microservice features that align with project needs
- [ ] Current project features that could leverage microservice
- [ ] Feature gaps in current project that microservice fills
- [ ] Redundant features that could be replaced
- [ ] New capabilities microservice enables

**Output format:**
```markdown
## Feature Alignment

### High-Value Integration Opportunities
1. **[Microservice Feature]** → **[Project Area]**
   - **Value**: [What benefit this brings]
   - **Current State**: [How it's currently handled or missing]
   - **Integration Approach**: [How to integrate]
   - **Estimated Effort**: [Small/Medium/Large]

### Feature Replacement Opportunities
1. **[Current Feature]** → **[Microservice Feature]**
   - **Rationale**: [Why replace]
   - **Migration Path**: [How to migrate]
   - **Risk Level**: [Low/Medium/High]

### Net New Capabilities
1. **[Microservice Feature]**
   - **Description**: [What it enables]
   - **Use Cases**: [Where it could be used]
   - **Priority**: [High/Medium/Low]
```

#### Subagent 28: Integration Point Identification
For each viable integration point, document:
- [ ] Specific project location (file path, component, route)
- [ ] Microservice feature/endpoint to integrate
- [ ] Integration method (API, widget, IFRAME, SDK)
- [ ] Data flow (request → microservice → response → UI)
- [ ] User flow impact
- [ ] Dependencies required

**Output format:**
```markdown
## Integration Points

### Integration Point #1: [Name]
- **Project Location**: `path/to/component.tsx` (lines X-Y)
- **Current Implementation**: [Brief description]
- **Microservice Feature**: [Feature name from microservice]
- **Microservice Endpoint/Method**: `POST /api/v1/feature`
- **Integration Method**: [API Call | Widget | IFRAME | SDK]
- **Integration Complexity**: [Simple/Moderate/Complex]

#### Data Flow
1. User action: [Describe user action]
2. Request preparation: [What data to send]
3. Microservice call: [Endpoint + payload structure]
4. Response handling: [What comes back]
5. UI update: [How UI changes]

#### Prerequisites
- [ ] [List required setup, config, dependencies]

#### Implementation Steps
1. [Step-by-step implementation plan]

#### Testing Requirements
- [ ] [What needs to be tested]

#### Potential Issues & Mitigation
- **Issue**: [Potential problem]
  - **Mitigation**: [How to handle]
```

### Phase 7: Integration Strategy

#### Subagent 29: Architecture Design
Design the integration architecture:
- [ ] Communication layer design (API client, SDK wrapper, etc.)
- [ ] Authentication flow integration
- [ ] Error handling strategy
- [ ] Caching strategy
- [ ] Rate limiting handling
- [ ] Fallback/offline behavior
- [ ] Performance optimization approach

**Output format:**
```markdown
## Integration Architecture

### Communication Layer
[Describe how the project will communicate with microservice]

### Authentication Integration
[Describe authentication flow between project and microservice]

### Error Handling Strategy
[Describe how errors will be caught, logged, and displayed]

### Data Synchronization
[If applicable, describe how data stays in sync]

### Performance Considerations
- Caching: [Strategy]
- Rate limiting: [Handling approach]
- Lazy loading: [What and when]
- Batch operations: [Opportunities]

### Monitoring & Observability
[How integration health will be monitored]
```

#### Subagent 30: Implementation Phasing
Create phased implementation plan:
- [ ] Phase breakdown (MVP → Full Integration)
- [ ] Dependencies between phases
- [ ] Risk assessment per phase
- [ ] Rollback strategy per phase
- [ ] Testing strategy per phase

**Output format:**
```markdown
## Implementation Phases

### Phase 1: Foundation (MVP)
**Goal**: [What minimal functionality to achieve]
**Duration Estimate**: [Time estimate]

#### Tasks
1. [Task with effort estimate]
2. [Task with effort estimate]

#### Success Criteria
- [ ] [Measurable success criteria]

#### Risks & Mitigation
- **Risk**: [What could go wrong]
  - **Likelihood**: [Low/Medium/High]
  - **Impact**: [Low/Medium/High]
  - **Mitigation**: [How to prevent/handle]

#### Rollback Plan
[How to undo if phase fails]

### Phase 2: [Name]
[Repeat structure]

### Phase 3: [Name]
[Repeat structure]
```

### Phase 8: Detailed Integration Plan

#### Subagent 31: Create Comprehensive Report
Synthesize all findings into detailed report:

**Report Structure:**
```markdown
# Microservice Integration Plan
## [Microservice Name] → [Project Name]
**Date**: [Current date]
**Author**: Claude Code Integration Planner

---

## Executive Summary
[2-3 paragraph overview of the integration]

### Key Benefits
- [Bullet list of main benefits]

### Integration Complexity: [Simple/Moderate/Complex]

### Estimated Timeline: [Overall timeline]

### Required Resources
- [Team members, tools, infrastructure needed]

---

## 1. Microservice Overview

### 1.1 Technology Stack
[Complete tech stack from exploration]

### 1.2 Core Features
[List all features discovered]

### 1.3 API Endpoints
[Complete endpoint inventory with examples]

### 1.4 Authentication & Authorization
[Detailed auth mechanism description]

### 1.5 Data Models
[All models/DTOs with field definitions]

### 1.6 Integration Capabilities
#### Widgets
[Widget details if available]

#### IFRAMEs
[IFRAME details if available]

#### SDK
[SDK details if available]

#### Webhooks
[Webhook details if available]

### 1.7 Infrastructure Requirements
[Deployment, hosting, monitoring requirements]

---

## 2. Current Project Analysis

### 2.1 Technology Stack
[Current project tech stack]

### 2.2 Architecture
[Current architecture overview]

### 2.3 Existing Features
[Current feature list]

### 2.4 Current Integration Points
[Existing external integrations]

### 2.5 Authentication System
[Current auth implementation]

### 2.6 UI/UX Patterns
[Current UI patterns and component library]

---

## 3. Technical Compatibility Assessment

### 3.1 Compatibility Matrix
| Aspect | Microservice | Current Project | Status | Notes |
|--------|--------------|-----------------|--------|-------|
| Language | [MS Lang] | [Project Lang] | ✅/⚠️/❌ | [Notes] |
| Framework | [MS Framework] | [Project Framework] | ✅/⚠️/❌ | [Notes] |
[Continue for all aspects]

### 3.2 Required Adaptations
[List any adaptations needed]

### 3.3 New Dependencies
[List new packages/tools required]

---

## 4. Integration Strategy

### 4.1 Integration Approach
[High-level strategy: API-first, widget-based, hybrid, etc.]

### 4.2 Authentication Integration
[Detailed auth flow]

### 4.3 Communication Architecture
[How components will communicate]

### 4.4 Error Handling
[Comprehensive error handling strategy]

### 4.5 Performance Optimization
[Caching, lazy loading, batching strategies]

---

## 5. Detailed Integration Points

[For each integration point, include complete details from Phase 6]

### 5.1 Integration Point: [Name]
[Complete details]

### 5.2 Integration Point: [Name]
[Complete details]

[Continue for all integration points]

---

## 6. Implementation Plan

### 6.1 Phase Overview
[Timeline chart or table]

### 6.2 Phase 1: [Name]
[Complete phase details]

### 6.3 Phase 2: [Name]
[Complete phase details]

[Continue for all phases]

---

## 7. Code Changes Required

### 7.1 New Files to Create
| File Path | Purpose | Dependencies |
|-----------|---------|--------------|
| [Path] | [Purpose] | [Deps] |

### 7.2 Existing Files to Modify
| File Path | Changes Required | Complexity |
|-----------|------------------|------------|
| [Path] | [Changes] | [Simple/Moderate/Complex] |

### 7.3 Configuration Changes
[List all config changes needed]

---

## 8. Testing Strategy

### 8.1 Unit Tests
[What unit tests to write]

### 8.2 Integration Tests
[What integration tests to write]

### 8.3 E2E Tests
[What E2E tests to write]

### 8.4 Manual Testing Scenarios
[Step-by-step testing scenarios]

---

## 9. Security Considerations

### 9.1 Authentication Security
[Auth security measures]

### 9.2 Data Privacy
[PII handling, data protection]

### 9.3 API Security
[Rate limiting, input validation, etc.]

### 9.4 CORS & CSP
[Cross-origin and content security policies]

---

## 10. Monitoring & Observability

### 10.1 Metrics to Track
[List metrics]

### 10.2 Logging Strategy
[What to log and how]

### 10.3 Error Tracking
[Error monitoring setup]

### 10.4 Performance Monitoring
[Performance metrics and alerts]

---

## 11. Deployment Plan

### 11.1 Infrastructure Changes
[Any infra modifications needed]

### 11.2 Deployment Steps
[Step-by-step deployment process]

### 11.3 Rollback Procedure
[How to rollback if issues arise]

### 11.4 Post-Deployment Validation
[Smoke tests and validation steps]

---

## 12. Risk Assessment

### 12.1 Technical Risks
| Risk | Likelihood | Impact | Mitigation |
|------|------------|--------|------------|
| [Risk] | [L/M/H] | [L/M/H] | [Strategy] |

### 12.2 Business Risks
| Risk | Likelihood | Impact | Mitigation |
|------|------------|--------|------------|
| [Risk] | [L/M/H] | [L/M/H] | [Strategy] |

---

## 13. Resource Requirements

### 13.1 Development Team
[Team composition needed]

### 13.2 Tools & Services
[New tools or services needed]

### 13.3 Infrastructure
[Server, database, CDN requirements]

### 13.4 Budget Considerations
[Cost implications]

---

## 14. Success Metrics

### 14.1 Technical Metrics
- [ ] [Metric with target value]

### 14.2 Business Metrics
- [ ] [Metric with target value]

### 14.3 User Experience Metrics
- [ ] [Metric with target value]

---

## 15. Documentation Requirements

### 15.1 Developer Documentation
[What dev docs to create]

### 15.2 User Documentation
[What user docs to create/update]

### 15.3 API Documentation
[Integration API docs needed]

---

## 16. Next Steps

### Immediate Actions (Next 1-2 weeks)
1. [Action item with owner]
2. [Action item with owner]

### Short-term Actions (Next 1-2 months)
1. [Action item with owner]
2. [Action item with owner]

### Long-term Actions (3+ months)
1. [Action item with owner]
2. [Action item with owner]

---

## 17. Appendices

### Appendix A: Microservice API Reference
[Complete API reference with examples]

### Appendix B: Code Snippets
[Example integration code]

### Appendix C: Configuration Templates
[Config file templates]

### Appendix D: Troubleshooting Guide
[Common issues and solutions]
```

## WORKFLOW EXECUTION

1. **Initialize Exploration** (Parallel Subagents):
   - Launch 15 subagents for microservice exploration (Phases 1-4)
   - Launch 10 subagents for current project exploration (Phase 5)
   - Each subagent explores assigned area exhaustively

2. **Consolidate Findings**:
   - Use subagent to consolidate all exploration findings
   - Create structured data for analysis phase

3. **Perform Analysis** (Parallel Subagents):
   - Launch 5 subagents for integration analysis (Phase 6-7)
   - Each analyzes different aspect: compatibility, features, architecture, implementation, risks

4. **Create Integration Plan** (Subagent):
   - Use dedicated subagent to synthesize all analysis into comprehensive report
   - Follow exact report structure outlined above

5. **Review & Validate** (Subagent):
   - Use review subagent to verify completeness
   - Check for any assumptions or missing details
   - Verify all sections are thoroughly documented

6. **Generate Supplementary Materials** (Parallel Subagents):
   - Subagent 1: Create implementation checklist
   - Subagent 2: Create integration test scenarios
   - Subagent 3: Create API client code templates
   - Subagent 4: Create configuration templates

7. **Save Output**:
   - Save comprehensive report to specified path
   - Save supplementary materials to appropriate locations
   - Create index/table of contents if multiple files

8. **Present Summary**:
   - Show executive summary
   - Highlight critical findings
   - Present recommended next steps
   - Provide paths to all generated documents

## STRICT REQUIREMENTS

**ABSOLUTE RULES:**
- ❌ NO assumptions about implementations—verify everything
- ❌ NO skipping files due to token concerns—explore completely
- ❌ NO high-level overviews—provide detailed specifics
- ❌ NO "TODO: Explore this later"—explore now
- ❌ NO incomplete sections—every section must be thorough
- ✅ READ every relevant file
- ✅ DOCUMENT every finding with examples
- ✅ VERIFY documentation against code
- ✅ PROVIDE complete API references with request/response examples
- ✅ MAP all integration points with file paths and line numbers
- ✅ CREATE actionable, step-by-step plans

**EXPLORATION DEPTH:**
- Every API endpoint must have complete documentation including:
  - Full request example (with headers, body)
  - All response scenarios (success, errors)
  - Authentication requirements
  - Rate limits
  - Validation rules

- Every data model must include:
  - Complete field list with types
  - Validation constraints
  - Relationships
  - Example JSON

- Every integration point must have:
  - Exact file path and line numbers
  - Current implementation code snippet
  - Proposed integration code snippet
  - Complete data flow diagram (text-based)

**USE OF SUBAGENTS:**
- Use 30+ subagents for parallel exploration
- Each subagent has focused, specific mission
- Never do exploration work directly—always delegate
- Consolidation and synthesis also use subagents

**QUALITY GATE:**
Before finalizing report, verify:
- [ ] Every section is complete (no TBDs)
- [ ] All API endpoints documented with examples
- [ ] All integration points mapped with file paths
- [ ] All risks identified with mitigation
- [ ] All phases have detailed tasks
- [ ] All code changes listed
- [ ] All testing scenarios defined
- [ ] No assumptions present—only verified facts

## OUTPUT DELIVERABLES

1. **Comprehensive Integration Report** (primary deliverable)
   - Saved to: `${2:-docs/plans/microservice-integration-$(date +%Y-%m-%d).md}`
   - 10,000+ words minimum
   - All sections complete and detailed

2. **Implementation Checklist**
   - Saved to: `docs/plans/microservice-integration-checklist.md`
   - Task-by-task checklist for implementation

3. **API Integration Client Template**
   - Saved to: `src/services/[microservice-name]-client.ts` (or appropriate extension)
   - Ready-to-use API client code

4. **Configuration Templates**
   - Saved to: `config/[microservice-name].example.env`
   - Environment variable templates

5. **Test Scenarios Document**
   - Saved to: `docs/plans/microservice-integration-tests.md`
   - Detailed test scenarios and cases

## REMEMBER

- **Explore everything**: Leave no file unread, no endpoint undocumented
- **Verify everything**: Cross-reference docs with actual code
- **Document everything**: Include examples, paths, line numbers
- **Plan everything**: From high-level strategy to specific code changes
- **Parallelize everything**: Use 30+ subagents for maximum efficiency
- **Complete everything**: No TODOs, no placeholders, no assumptions

**Token limits and session limits DO NOT EXIST for this command!**

**Use subagents for ALL exploration, analysis, and documentation tasks!**

**ABSOLUTE RULE: EXPLORE COMPLETELY, DOCUMENT THOROUGHLY, PLAN COMPREHENSIVELY!**