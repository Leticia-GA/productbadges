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

## 🧩 Instalación del módulo
1. Entrar al backoffice
2. Ir a “Módulos” → “Gestor de módulos”
3. Buscar "Product Badges"

![alt text](images/image.png)

4. Click en instalar

5. Aparecerá el nuevo módulo en el menú

![alt text](images/image-1.png)

6. Añadir una nueva etiqueta rellenando los campos y guardar

![alt text](images/image-2.png)
![alt text](images/image-3.png)

7. Entrar en la edición de cualquier producto, buscar el módulo "Product Badges", configurarlo con las etiquetas creadas y guardarlo.

![alt text](images/image-4.png)
![alt text](images/image-5.png)

8. En el front del producto aparecerán las etiquetas customizadas

![alt text](images/image-7.png)
![alt text](images/image-6.png)

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

Leticia González Álvarez (prueba técnica Product Badges - PrestaShop Developer Task)


## Preguntas
**1. Cuéntanos un proyecto de e-commerce real en el que hayas trabajado: tu papel concreto, una decisión técnica de la que estés orgulloso y un error grave que cometieras y qué aprendiste de él.**

En Dashbook trabajé como desarrolladora web en una plataforma e-commerce centrada en la venta online y crowdfunding de libros. Aunque mi etapa allí fue relativamente corta, participé principalmente en tareas de backend y mantenimiento de la plataforma, trabajando sobre funcionalidades ya existentes y realizando mejoras orientadas tanto a la estabilidad del sistema como a la experiencia de usuario. También tuve ocasión de trabajar puntualmente en tareas de frontend cuando el proyecto lo requería.

No recuerdo haber tenido que tomar una gran decisión de arquitectura porque estuve poco tiempo en el proyecto y mi rol era más de desarrollo y mantenimiento sobre una plataforma ya existente. Aun así, sí estoy orgullosa de haber mantenido un ritmo de entrega constante y estable, sin introducir incidencias importantes en producción.
Además, intenté impulsar algunas buenas prácticas dentro del equipo, especialmente relacionadas con testing y validación de cambios antes de desplegar. Aunque fueran mejoras pequeñas, aprendí que en proyectos e-commerce la estabilidad y la capacidad de mantener el código de forma segura son muy importantes, porque cualquier bug puede afectar directamente a la experiencia de compra.

Uno de los errores de los que más aprendí ocurrió mientras trabajaba en un endpoint backend que necesitaba integrarse rápidamente desde frontend. La implementación principal estaba terminada, pero todavía me faltaba validar algunos casos de uso y ciertos parámetros concretos antes de darlo por cerrado.

Como había bastante presión por entregar cuanto antes para poder avanzar con la integración, acabé pasando el endpoint antes de completar todas las pruebas. El problema fue que precisamente uno de los casos que no había validado generó un comportamiento incorrecto en en entorno de producción durante unas horas.

No fue un fallo crítico, pero sí me hizo darme cuenta de la importancia de no asumir que “si funciona en el caso principal, ya está listo”. A partir de ahí aprendí varias cosas: la importancia de tener claros los requisitos y escenarios desde el principio, mantener una comunicación más precisa entre frontend y backend sobre el estado real de una tarea, y no dejar de lado los tests incluso cuando hay presión por entregar rápido. Desde entonces intento validar siempre los casos límite y apoyarme más en testing para reducir errores en integración y producción.

**2. La última vez que un asistente de IA te dio una respuesta convincente pero incorrecta o peligrosa, y cómo lo detectaste. Si no recuerdas ninguna, dilo y explícanos por qué crees que es.**

Cuando empecé a usar asistentes de IA en el trabajo, en alguna ocasión le pedí que me generara tests para una clase concreta. El resultado que me dio era correcto en general, pero omitía algún caso “malo” o edge case importante, por lo que no se cubría completamente el comportamiento real del código.

Me di cuenta de este problema al revisarlo todo con más atención y al pensar en escenarios de error que no estaban contemplados.

Además también me ha pasado que, al preguntar dudas técnicas puntuales, muchas veces me devuelve código incorrecto o con supuestos que no aplican a mi contexto. 