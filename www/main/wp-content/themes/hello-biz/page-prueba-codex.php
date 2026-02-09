<?php
/**
 * Template Name: Pagina de Prueba Codex
 * Description: Plantilla de ejemplo con diseno basico en HTML y CSS.
 * Template Post Type: page
 */

// Incluye la cabecera global del tema (head, menus y apertura del body).
get_header();
?>

<style>
/* Estilos internos exclusivos para esta plantilla */
.codex-test-page {
    font-family: "Helvetica Neue", Arial, sans-serif;
    color: #1f2937;
    background-color: #f3f4f6;
    min-height: 70vh;
    padding: 60px 20px 40px;
    box-sizing: border-box;
}

.codex-test-wrapper {
    max-width: 1100px;
    margin: 0 auto;
    text-align: center;
}

.codex-hero h1 {
    font-size: 2.8rem;
    margin-bottom: 12px;
    color: #111827;
}

.codex-hero p {
    font-size: 1.1rem;
    color: #4b5563;
    margin-bottom: 48px;
}

.codex-card-grid {
    display: grid;
    gap: 24px;
    grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
    margin-bottom: 48px;
}

.codex-card {
    background-color: #ffffff;
    border-radius: 12px;
    padding: 24px;
    box-shadow: 0 10px 25px rgba(15, 23, 42, 0.08);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.codex-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 16px 30px rgba(15, 23, 42, 0.12);
}

.codex-card h3 {
    font-size: 1.4rem;
    margin-bottom: 12px;
    color: #111827;
}

.codex-card p {
    font-size: 0.98rem;
    color: #6b7280;
    margin-bottom: 20px;
}

.codex-card a {
    display: inline-block;
    padding: 10px 18px;
    border-radius: 999px;
    background: linear-gradient(135deg, #4f46e5, #6366f1);
    color: #ffffff;
    text-decoration: none;
    font-weight: 600;
    transition: background 0.2s ease, transform 0.2s ease;
}

.codex-card a:hover {
    background: linear-gradient(135deg, #4338ca, #4f46e5);
    transform: translateY(-2px);
}

.codex-footer {
    font-size: 0.95rem;
    color: #4b5563;
}

/* Ajustes responsivos simples */
@media (max-width: 640px) {
    .codex-hero h1 {
        font-size: 2.2rem;
    }

    .codex-hero p {
        font-size: 1rem;
    }
}
</style>

<main class="codex-test-page">
    <div class="codex-test-wrapper">
        <!-- Seccion de bienvenida principal -->
        <section class="codex-hero">
            <h1>Bienvenido a mi p&aacute;gina de prueba Codex &#128640;</h1>
            <p>Esta plantilla demuestra c&oacute;mo estructurar r&aacute;pidamente una p&aacute;gina personalizada dentro de tu tema de WordPress.</p>
        </section>

        <!-- Seccion de tarjetas informativas -->
        <section class="codex-card-grid">
            <article class="codex-card">
                <h3>T&iacute;tulo de la tarjeta 1</h3>
                <p>Descripci&oacute;n breve que explica el primer elemento destacado de la p&aacute;gina.</p>
                <a href="#">Ver m&aacute;s</a>
            </article>

            <article class="codex-card">
                <h3>T&iacute;tulo de la tarjeta 2</h3>
                <p>Texto corto para presentar otro aspecto interesante de tu proyecto.</p>
                <a href="#">Ver m&aacute;s</a>
            </article>

            <article class="codex-card">
                <h3>T&iacute;tulo de la tarjeta 3</h3>
                <p>Un resumen r&aacute;pido que invita al visitante a seguir explorando.</p>
                <a href="#">Ver m&aacute;s</a>
            </article>
        </section>

        <!-- Pie de pagina personalizado para la plantilla -->
        <footer class="codex-footer">
            Hecho con &#10084;&#65039; en WordPress local.
        </footer>
    </div>
</main>

<?php
// Incluye el pie global del tema (scripts y cierre de body/html).
get_footer();
