Commit all unstaged files to git with cleanup.

Before committing, you MUST:
1. Delete all files named "nul", "NUL", "null", "NULL", or similar variations (case-insensitive)
2. Search for these files in all directories recursively
3. Use appropriate commands for the OS (del for Windows, rm for Unix)

Then:
1. Stage all unstaged files using `git add .` or individually
2. Create a descriptive commit message following conventional commits format
3. Include the Claude Code signature:

```
🤖 Generated with [Claude Code](https://claude.com/claude-code)

Co-Authored-By: Claude <noreply@anthropic.com>
```

4. Execute the commit using a HEREDOC for proper formatting
5. Show git status after commit to confirm success

IMPORTANT:
- NEVER commit files named "nul", "NUL", "null", "NULL" or variations
- Always verify these files are deleted before staging
- Use parallel git commands where appropriate

Use subagents (IMPORTANT) for ALL tasks!
