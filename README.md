# Kensho Project (site)

## Setup

1. Copy environment file and add your database credentials (never commit `.env`):

   ```bash
   cp .env.example .env
   ```

2. Fill in `DB_HOST`, `DB_USER`, `DB_PASSWORD`, and `DB_NAME` to match your MySQL database.

3. Optionally set `MAIL_ADMIN` and `MAIL_FROM` for `chatbot_lead.php` notifications.

4. Deploy to PHP 7.4+ (or 8.x) with the `mysqli` extension enabled.

## Git

`.env` is ignored. Only `.env.example` is tracked so the repository stays safe to push publicly.
