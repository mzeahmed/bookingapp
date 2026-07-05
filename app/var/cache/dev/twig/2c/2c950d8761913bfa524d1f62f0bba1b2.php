<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Sandbox\SecurityNotAllowedTestError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* partials/_header.html.twig */
class __TwigTemplate_643eec52c8d259aa3366f1ced7e5b544 extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "partials/_header.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "partials/_header.html.twig"));

        // line 1
        yield "<!-- Header Navigation -->
<header id=\"header\" class=\"fixed-top border-bottom\">
    <div class=\"container-xl px-4\">
        <div class=\"d-flex justify-content-between align-items-center\" style=\"height: 80px;\">

            <!-- Logo -->
            <div class=\"d-flex align-items-center flex-shrink-0\" style=\"cursor: pointer;\">
                <a href=\"";
        // line 8
        yield (string) $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "\" class=\"d-flex align-items-center text-decoration-none\" style=\"cursor: pointer;\">
                    <div class=\"d-flex align-items-center justify-content-center rounded-2 me-3 bg-primary-app\" style=\"width: 32px; height: 32px;\">
                        <i class=\"fa-solid fa-layer-group text-white\" style=\"font-size: 14px;\"></i>
                    </div>
                    <span class=\"fw-bold fs-5 tracking-tight text-app\">Bookingapp</span>
                </a>
            </div>

            <!-- Desktop Menu -->
            <nav class=\"d-none d-md-flex gap-4\">
                <a href=\"#\" class=\"nav-link-app\">Link 1</a>
                <a href=\"#\" class=\"nav-link-muted\">Link 2</a>
                <a href=\"#\" class=\"nav-link-muted\">Link 3</a>
                <a href=\"#\" class=\"nav-link-muted\">Link 4</a>
            </nav>

            <!-- Auth Buttons -->
            <div class=\"d-none d-md-flex align-items-center gap-2\">
                ";
        // line 26
        if ( !(($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 26, $this->source); })()), "user", [], "any", false, false, false, 26)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 27
            yield "                    <a href=\"";
            yield (string) $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_login");
            yield "\" class=\"btn-login\">Log in</a>
                    <a href=\"";
            // line 28
            yield (string) $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_register");
            yield "\" class=\"btn-signup\">Sign up</a>
                ";
        }
        // line 30
        yield "            </div>

            <!-- Mobile menu button -->
            <div class=\"d-md-none\">
                <button class=\"btn p-2 border-0 text-app\">
                    <i class=\"fa-solid fa-bars fs-5\"></i>
                </button>
            </div>
        </div>
    </div>
</header>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "partials/_header.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  91 => 30,  86 => 28,  81 => 27,  79 => 26,  58 => 8,  49 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!-- Header Navigation -->
<header id=\"header\" class=\"fixed-top border-bottom\">
    <div class=\"container-xl px-4\">
        <div class=\"d-flex justify-content-between align-items-center\" style=\"height: 80px;\">

            <!-- Logo -->
            <div class=\"d-flex align-items-center flex-shrink-0\" style=\"cursor: pointer;\">
                <a href=\"{{ path(\x27app_home\x27) }}\" class=\"d-flex align-items-center text-decoration-none\" style=\"cursor: pointer;\">
                    <div class=\"d-flex align-items-center justify-content-center rounded-2 me-3 bg-primary-app\" style=\"width: 32px; height: 32px;\">
                        <i class=\"fa-solid fa-layer-group text-white\" style=\"font-size: 14px;\"></i>
                    </div>
                    <span class=\"fw-bold fs-5 tracking-tight text-app\">Bookingapp</span>
                </a>
            </div>

            <!-- Desktop Menu -->
            <nav class=\"d-none d-md-flex gap-4\">
                <a href=\"#\" class=\"nav-link-app\">Link 1</a>
                <a href=\"#\" class=\"nav-link-muted\">Link 2</a>
                <a href=\"#\" class=\"nav-link-muted\">Link 3</a>
                <a href=\"#\" class=\"nav-link-muted\">Link 4</a>
            </nav>

            <!-- Auth Buttons -->
            <div class=\"d-none d-md-flex align-items-center gap-2\">
                {% if not app.user %}
                    <a href=\"{{ path(\x27app_login\x27) }}\" class=\"btn-login\">Log in</a>
                    <a href=\"{{ path(\x27app_register\x27) }}\" class=\"btn-signup\">Sign up</a>
                {% endif %}
            </div>

            <!-- Mobile menu button -->
            <div class=\"d-md-none\">
                <button class=\"btn p-2 border-0 text-app\">
                    <i class=\"fa-solid fa-bars fs-5\"></i>
                </button>
            </div>
        </div>
    </div>
</header>
", "partials/_header.html.twig", "/var/www/html/app/templates/partials/_header.html.twig");
    }
}
