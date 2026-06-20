## Génération des certificats

```bash
mkcert -install

mkdir certs

cd certs

mkcert bookingapp.local "*.bookingapp.local"
