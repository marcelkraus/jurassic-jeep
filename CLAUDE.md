# jurassicjeep-homepage
> krauswerk > marcelkraus-hub > krausgeborgt-hub > jurassicjeep-brand > jurassicjeep-homepage

Dieses Projekt ist Teil des krauswerks – meinem persönlichen Hub für
alle Projekte und Marken. Übergeordneter Kontext und Struktur sind im
krauswerk-Repository dokumentiert:
https://github.com/marcelkraus/krauswerk

## Beschreibung

Meine Website für das Jurassic Jeep-Projekt
(https://www.jurassicjeep.de). Die Seite präsentiert meinen
detailgetreuen Nachbau eines 1993er Jeep Wrangler Sahara aus den
Filmen „Jurassic Park" (1993) und „Jurassic World" (2015).

## Technologie-Stack

- **Backend:** Symfony 8.0, PHP 8.4
- **Templates:** Twig
- **Styling:** Tailwind CSS 3.3.3 und Bootstrap 4
- **Anti-Spam:** Omines AntiSpamBundle (Honeypot, Timer, URL-Count)
- **Mail:** Symfony Mailer mit TemplatedEmail
- **Datenbank:** Doctrine ORM, MariaDB 10.4
- **Analytics:** Matomo (cookie-free, Site ID 1)
- **Entwicklung:** DDEV (Nginx-FPM, PHP 8.4)

## Entwicklungsumgebung

### DDEV starten

```bash
ddev start
```

Zugriff über: https://jurassic-jeep.ddev.site

### Tailwind CSS kompilieren

```bash
npm run build
npm run watch
```

### Symfony-Befehle

```bash
ddev exec php bin/console cache:clear
ddev exec php bin/console debug:routes
php bin/phpunit
```

## Projektstruktur

```
jurassicjeep-homepage/
├── config/
│   └── packages/                      ← Bundle-Konfigurationen
├── src/
│   ├── Controller/
│   │   ├── StaticContentController.php  ← Startseite, Historie, Events, Vermietung
│   │   ├── VehicleContentController.php ← Fahrzeugdetails (7 Unterseiten)
│   │   ├── ContactController.php        ← Kontaktformular
│   │   └── LegalContentController.php   ← Impressum, Datenschutz
│   ├── Entity/
│   │   └── ContactRequest.php           ← Kontaktformular-Entity
│   └── Form/Type/
│       └── ContactRequestType.php       ← Kontaktformular-Type
├── templates/
│   ├── base.html.twig                   ← Basis-Template
│   ├── header.html.twig
│   ├── content/
│   │   ├── homepage.html.twig
│   │   ├── history.html.twig            ← Historie des Jeep
│   │   ├── events.html.twig             ← Eventübersicht
│   │   ├── leasing.html.twig            ← Vermietung
│   │   ├── vehicle/                     ← Fahrzeugdetails
│   │   │   ├── index.html.twig
│   │   │   ├── fog-lights.html.twig
│   │   │   ├── paintjob.html.twig
│   │   │   ├── panels.html.twig
│   │   │   ├── rims.html.twig
│   │   │   ├── seats.html.twig
│   │   │   └── softtop.html.twig
│   │   ├── contact/
│   │   │   ├── index.html.twig
│   │   │   └── confirmation.html.twig
│   │   └── legal/
│   │       ├── imprint.html.twig
│   │       └── privacy.html.twig
│   ├── sidebar/
│   │   ├── navigation.html.twig
│   │   ├── social-media.html.twig
│   │   ├── motorpool.html.twig
│   │   └── next-event.html.twig
│   ├── partials/
│   │   └── card.html.twig
│   └── emails/
│       └── contact.txt.twig
├── public/
│   ├── css/
│   │   ├── input.css                    ← Tailwind-Input
│   │   ├── output.css                   ← Kompiliertes Tailwind CSS
│   │   └── main.css
│   └── images/
│       └── fahrzeug/                    ← Fahrzeugfotos
├── migrations/
├── tests/
├── .ddev/config.yaml
├── composer.json
├── package.json
└── tailwind.config.js
```

## Routing

### Statische Inhalte

| Route | Beschreibung |
|-------|-------------|
| `GET /` | Startseite |
| `GET /die-historie-des-jeep` | Geschichte des Jeep |
| `GET /events` | Eventübersicht |
| `GET /den-jeep-mieten` | Vermietungsinformationen |

### Fahrzeugdetails

| Route | Beschreibung |
|-------|-------------|
| `GET /der-jeep-im-detail` | Übersicht |
| `GET /der-jeep-im-detail/die-nebelscheinwerfer` | Nebelscheinwerfer |
| `GET /der-jeep-im-detail/die-lackierung` | Lackierung |
| `GET /der-jeep-im-detail/die-verkleidungen` | Verkleidungen |
| `GET /der-jeep-im-detail/die-felgen-und-reifen` | Felgen und Reifen |
| `GET /der-jeep-im-detail/die-sitze-und-teppiche` | Sitze und Teppiche |
| `GET /der-jeep-im-detail/das-softtop-mit-halbtueren` | Softtop mit Halbtüren |

### Kontakt und Rechtliches

| Route | Beschreibung |
|-------|-------------|
| `GET /kontakt` | Kontaktformular |
| `GET /kontakt/nachricht-erhalten` | Bestätigungsseite |
| `GET /impressum` | Impressum |
| `GET /datenschutz` | Datenschutzerklärung |

## Kontaktformular

- Felder: Vorname, Nachname, E-Mail, Telefon (optional), Nachricht
- Anti-Spam-Profil: Honeypot, Timer (3–3600 Sekunden), Markup-Filter,
  URL-Limit (maximal 2 URLs)
- E-Mail-Versand über Symfony Mailer
- Weiterleitung zur Bestätigungsseite

## Umgebungsvariablen

| Variable | Beschreibung |
|----------|-------------|
| `APP_ENV` | Umgebung (`dev` / `prod`) |
| `APP_SECRET` | Symfony Secret |
| `MAILER_DSN` | Mail-Transport |
| `CONTACT_FORM_SENDER_ADDRESS` | Absender (no-reply@jurassicjeep.de) |
| `CONTACT_FORM_RECIPIENT_ADDRESS` | Empfänger (hallo@jurassicjeep.de) |

