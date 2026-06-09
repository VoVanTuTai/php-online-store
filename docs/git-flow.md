# Lightweight Git Flow

This project uses a lightweight branch workflow:

- `main`: stable code for release/demo.
- `develop`: main daily development branch.
- `feature/*`: one branch per feature or improvement.
- `release/*`: created only when preparing a versioned release.
- `hotfix/*`: urgent fixes branched from `main`.

## Daily Workflow

Start new work from `develop`:

```bash
git checkout develop
git pull
git checkout -b feature/short-feature-name
```

Commit with a Conventional Commit message:

```bash
git add .
git commit -m "feat: add product search"
```

Merge finished work back into `develop`:

```bash
git checkout develop
git merge --no-ff feature/short-feature-name
git branch -d feature/short-feature-name
```

## Release Workflow

Prepare a release from `develop`:

```bash
git checkout develop
git checkout -b release/v1.0.0
```

After final checks, merge to `main` and tag:

```bash
git checkout main
git merge --no-ff release/v1.0.0
git tag v1.0.0
git checkout develop
git merge --no-ff main
```

## Hotfix Workflow

Create urgent fixes from `main`:

```bash
git checkout main
git checkout -b hotfix/fix-critical-bug
```

After fixing, merge back into both `main` and `develop`.

