# Uso de IA en este proyecto

## 1. Herramientas utilizadas

| Herramienta | Versión / Modelo | Modo de uso | Aprox. % del trabajo |
|---|---|---|---|
| OpenCode 1.15.5 | GPT-4.x (si aplica) | IDE agent | 70% |
| ChatGPT | GPT-5.x | consultas puntuales | 30% |

## 2. Configuración del proyecto

### CLAUDE.md / AGENTS.md
Se ha utilizado `.opencode/AGENTS.md` como archivo de instrucciones del agente.

### settings.json u otra configuración equivalente
No se realizaron cambios adicionales.

## 3. Skills personalizadas
ninguna

## 4. Slash commands personalizados
ninguno

## 5. Sub-agentes invocados
ninguno

## 6. MCPs
ninguno

## 7. Prompts importantes

### Prompt 1
- Herramienta: OpenCode
- Prompt: "Diseña la estructura del módulo productbadges para PrestaShop 1.7"
- Qué generó: estructura inicial del módulo
- Qué hice: adapté a requisitos de la prueba

## 8. Errores de la IA que detecté

- IA intentó usar hooks inexistentes en PrestaShop 1.7 → corregido usando documentación oficial
- Queries SQL sin pSQL → corregido para seguridad

## 9. Partes sin IA
Revisión final de seguridad y estructura del módulo.

## 10. Reflexión final
La IA aceleró la estructura del módulo, pero requirió revisión en integración con PrestaShop.