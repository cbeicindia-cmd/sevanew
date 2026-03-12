#!/usr/bin/env bash
set -euo pipefail

ROOT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
cd "$ROOT_DIR"

echo "[1/3] PHP syntax lint"
find app database routes -name '*.php' -print0 | xargs -0 -n1 php -l >/tmp/php-lint.log
cat /tmp/php-lint.log

echo "[2/3] Python syntax lint"
python3 -m py_compile ai/recommendation_api.py

echo "[3/3] Shell script syntax lint"
bash -n scripts/deploy_hostinger.sh

echo "All checks passed."
