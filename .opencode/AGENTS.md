# ProductBadges - OpenCode Agent Instructions

## Contexto del proyecto
Este repositorio contiene un módulo para PrestaShop 1.7 llamado `productbadges`.

El objetivo es construir un sistema de etiquetas reutilizables para productos del catálogo.

## Reglas generales
- Seguir estrictamente los requisitos del enunciado de la prueba técnica.
- No inventar funcionalidades no descritas.
- Priorizar soluciones simples, mantenibles y propias de PrestaShop 1.7.8.x.
- Usar APIs nativas de PrestaShop siempre que sea posible.

## Arquitectura obligatoria
- Lógica de negocio en clases separadas cuando sea posible.
- Back office en `ModuleAdminController`, no en el archivo principal del módulo.
- Uso correcto de `ObjectModel`, `HelperForm`, `HelperList`.
- Uso de hooks estándar de PrestaShop.

## Calidad de código
- Sanitizar TODAS las entradas (pSQL, Validate, cast explícitos).
- Escapar salidas en templates.
- Validación server-side obligatoria.
- Evitar lógica en templates.

## Base técnica
- PrestaShop 1.7.8.11
- PHP 7.4 o 8.1
- Bootstrap = true
- jQuery únicamente (sin librerías externas JS)

## Base de datos
- Usar _DB_PREFIX_
- Queries seguras con Db::getInstance()
- Relación muchos a muchos productos ↔ badges

## Frontend
- Mostrar badges solo en hooks necesarios:
  - listado productos
  - búsqueda
  - home (si aplica)
  - ficha de producto
- Cargar assets solo donde se necesiten

## Multitienda y multilenguaje
- Compatible con multitienda
- Textos traducibles con $this->l()
- Soporte mínimo: es y en

## Instalación/desinstalación
- No dejar tablas huérfanas
- No dejar hooks registrados
- No dejar tabs en back office

## Restricciones importantes
- No usar Composer salvo justificación explícita
- No usar librerías JS externas
- No añadir complejidad innecesaria

## Objetivo del agente
Construir el módulo de forma incremental, clara y defendible en revisión técnica.