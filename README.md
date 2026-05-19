# Product Badges Module for PrestaShop 1.7

Módulo personalizado para PrestaShop 1.7.8.x que permite crear y gestionar etiquetas visuales reutilizables (badges) para productos del catálogo.

---

## 🚀 Requisitos

- Docker Engine (recomendado >= 24.x)
- Docker Compose v2 (>= 2.20)
- Git

Probado con:

- PHP: 7.4 (contenedor)
- PrestaShop: 1.7.8.11
- MySQL: 5.7

---

## 📦 Instalación del proyecto

### 1. Clonar el repositorio

```bash
git git@github.com:Leticia-GA/productbadges.git
cd productbadges
```
⚠️ Asegúrate de ejecutar este comando en la carpeta donde se encuentra el archivo `docker-compose.yml`.

### 2. Levantar entorno Docker
```bash
docker compose up -d
```

Esto levantará:

- PrestaShop en: http://localhost:8080
- Base de datos MySQL

### 3. Acceder a PrestaShop
Una vez iniciado el contenedor:
- Front office: http://localhost:8080
- Back office: http://localhost:8080/admin123
    - usuario: `demo@prestashop.com`
    - password: `prestashop_demo`

## 🔐 Credenciales de base de datos (Docker)

- Database server: `db`
- Database name: `prestashop`
- Database user: `root`
- Database password: `root`

| En caso de instalación manual desde el instalador web de PrestaShop, usar estos datos.

## 🧩 Instalación del módulo
1. Entrar al backoffice
2. Ir a “Módulos” → “Gestor de módulos”
3. Buscar "Product Badges"
4. Click en instalar

## ⚙️ Funcionalidad del módulo

Una vez instalado:

- Permite crear badges reutilizables
- Define:
    - Texto
    - Color de fondo
    - Color de texto
    - Posición (izquierda/derecha)
    - Estado activo/inactivo
- Asignación a productos
- Visualización en frontend mediante hooks

## 🧪 Notas de desarrollo

Este proyecto ha sido desarrollado con ayuda de herramientas de IA, pero todo el código ha sido revisado manualmente y validado para compatibilidad con PrestaShop 1.7.8.x.

Ver archivo `IA.md` para detalle del uso de IA y errores detectados.

## 👤 Autor

Leticia (prueba técnica Product Badges - PrestaShop Developer Task)