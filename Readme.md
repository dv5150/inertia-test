# Laravel + InertiaJS test app

---

### Setup:
1. Use [mkcert](https://github.com/FiloSottile/mkcert) to generate certification files named `filament.test` and move the key pair into the `/certs` directory:
   - /certs/inertia.test.pem
   - /certs/inertia.test-key.pem
2. `$ docker compose up -d`
3. `$ docker-compose exec -it inertia-app /bin/bash`
4. `$ cp .env.example .env`
5. Connect to `inertia-mysql` container with your db manager application and create a new database called `inertia` or set your own db name in the `.env` file.
6. Run `$ php artisan migrate --seed` to get your login data. 
7. Visit `https://inertia.test` for the application and `localhost:8025` for Mailhog.