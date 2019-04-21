
find . -type f \
  -name "*.php" -or -name "*.css" | entr reload-chrome.sh
