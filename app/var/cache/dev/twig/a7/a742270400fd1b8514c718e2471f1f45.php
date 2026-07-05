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

/* security/login.html.twig */
class __TwigTemplate_2ce0f3af4a2d74eb1be4a724c3fecbf7 extends Template
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

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body_class' => [$this, 'block_body_class'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "security/login.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "security/login.html.twig"));

        $this->parent = $this->load("base.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        yield "Log in!";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body_class(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body_class"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body_class"));

        yield "login-page";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 7
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 8
        yield "    <section class=\"auth-section py-5\">
        <div class=\"container-xl px-4\">
            <div class=\"row justify-content-center\">
                <div class=\"col-12 col-md-10 col-lg-7 col-xl-5\">
                    <div class=\"auth-card p-4 p-md-5\">
                        <div class=\"mb-4 text-center\">
                            <span class=\"auth-badge mb-3\">
                                <i class=\"fa-solid fa-shield-halved\"></i>
                                Secure access
                            </span>
                            <h1 class=\"fw-bold text-app mb-2\" style=\"font-size: clamp(2rem, 4vw, 2.75rem); line-height: 1.1;\">
                                Welcome back
                            </h1>
                            <p class=\"text-muted-app mb-0\" style=\"font-size: 1rem;\">
                                Log in to manage your bookings, spaces, and team reservations in one place.
                            </p>
                        </div>

                        <form method=\"post\">
                            ";
        // line 27
        if ((($tmp = (isset($context["error"]) || array_key_exists("error", $context) ? $context["error"] : (function () { throw new RuntimeError('Variable "error" does not exist.', 27, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 28
            yield "                                <div class=\"alert alert-danger\">";
            yield (string) $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(CoreExtension::getAttribute($this->env, $this->source, (isset($context["error"]) || array_key_exists("error", $context) ? $context["error"] : (function () { throw new RuntimeError('Variable "error" does not exist.', 28, $this->source); })()), "messageKey", [], "any", false, false, false, 28), CoreExtension::getAttribute($this->env, $this->source, (isset($context["error"]) || array_key_exists("error", $context) ? $context["error"] : (function () { throw new RuntimeError('Variable "error" does not exist.', 28, $this->source); })()), "messageData", [], "any", false, false, false, 28), "security"), "html", null, true);
            yield "</div>
                            ";
        }
        // line 30
        yield "
                            ";
        // line 31
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 31, $this->source); })()), "user", [], "any", false, false, false, 31)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 32
            yield "                                <div class=\"mb-3\">
                                    You are logged in as ";
            // line 33
            yield (string) $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 33, $this->source); })()), "user", [], "any", false, false, false, 33), "userIdentifier", [], "any", false, false, false, 33), "html", null, true);
            yield ", <a href=\"";
            yield (string) $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\LogoutUrlExtension']->getLogoutPath(), "html", null, true);
            yield "\">Logout</a>
                                </div>
                            ";
        }
        // line 36
        yield "
                            <div class=\"mb-3\">
                                <label for=\"email\" class=\"form-label form-label-custom\">Email address</label>
                                <div class=\"input-icon-wrap\">
                                    <i class=\"fa-regular fa-envelope input-icon\"></i>
                                    <input
                                        type=\"email\"
                                        value=\"";
        // line 43
        yield (string) $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["last_username"]) || array_key_exists("last_username", $context) ? $context["last_username"] : (function () { throw new RuntimeError('Variable "last_username" does not exist.', 43, $this->source); })()), "html", null, true);
        yield "\"
                                        name=\"_username\"
                                        id=\"username\"
                                        class=\"form-control form-control-custom\"
                                        autocomplete=\"email\"
                                        aria-label=\"Email address\"
                                        required
                                        autofocus
                                    >

                                </div>
                            </div>

                            <div class=\"mb-3\">
                                <div class=\"d-flex justify-content-between align-items-center mb-2\">
                                    <label for=\"password\" class=\"form-label form-label-custom mb-0\">Password</label>
                                    <a href=\"#\" class=\"text-primary-app text-decoration-none fw-medium\" style=\"font-size: 0.875rem;\">
                                        Forgot password?
                                    </a>
                                </div>

                                <div class=\"input-icon-wrap\">
                                    <i class=\"fa-solid fa-lock input-icon\"></i>
                                    <input
                                        type=\"password\"
                                        name=\"_password\"
                                        id=\"password\"
                                        class=\"form-control form-control-custom\"
                                        autocomplete=\"current-password\"
                                        aria-label=\"Password\"
                                        required
                                    >

                                </div>
                            </div>

                            <input type=\"hidden\" name=\"_csrf_token\" data-controller=\"csrf-protection\" value=\"";
        // line 79
        yield (string) $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken("authenticate"), "html", null, true);
        yield "\">

                            <div class=\"d-flex justify-content-between align-items-center mb-4\">
                                <div class=\"form-check\">
                                    <input class=\"form-check-input\" type=\"checkbox\" id=\"_remember_me\">
                                    <label class=\"form-check-label text-muted-app\" for=\"_remember_me\" style=\"font-size: 0.875rem;\">
                                        Remember me
                                    </label>
                                </div>
                            </div>

                            <button type=\"submit\" class=\"btn btn-auth-primary w-100 mb-4\">
                                Log in
                            </button>

                            <div class=\"divider-auth mb-4\">
                                <span>or continue with</span>
                            </div>

                            <div class=\"row g-3 mb-4\">
                                <div class=\"col-12 col-sm-6\">
                                    <button type=\"button\" class=\"btn btn-auth-social w-100\">
                                        <i class=\"fa-brands fa-google me-2\"></i>
                                        Google
                                    </button>
                                </div>
                                <div class=\"col-12 col-sm-6\">
                                    <button type=\"button\" class=\"btn btn-auth-social w-100\">
                                        <i class=\"fa-brands fa-microsoft me-2\"></i>
                                        Microsoft
                                    </button>
                                </div>
                            </div>

                            <p class=\"text-center text-muted-app mb-0\" style=\"font-size: 0.95rem;\">
                                Don’t have an account?
                                <a href=\"#\" class=\"text-primary-app text-decoration-none fw-semibold\">Create one</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "security/login.html.twig";
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
        return array (  218 => 79,  179 => 43,  170 => 36,  162 => 33,  159 => 32,  157 => 31,  154 => 30,  148 => 28,  146 => 27,  125 => 8,  112 => 7,  89 => 5,  66 => 3,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends \x27base.html.twig\x27 %}

{% block title %}Log in!{% endblock %}

{% block body_class %}login-page{% endblock %}

{% block body %}
    <section class=\"auth-section py-5\">
        <div class=\"container-xl px-4\">
            <div class=\"row justify-content-center\">
                <div class=\"col-12 col-md-10 col-lg-7 col-xl-5\">
                    <div class=\"auth-card p-4 p-md-5\">
                        <div class=\"mb-4 text-center\">
                            <span class=\"auth-badge mb-3\">
                                <i class=\"fa-solid fa-shield-halved\"></i>
                                Secure access
                            </span>
                            <h1 class=\"fw-bold text-app mb-2\" style=\"font-size: clamp(2rem, 4vw, 2.75rem); line-height: 1.1;\">
                                Welcome back
                            </h1>
                            <p class=\"text-muted-app mb-0\" style=\"font-size: 1rem;\">
                                Log in to manage your bookings, spaces, and team reservations in one place.
                            </p>
                        </div>

                        <form method=\"post\">
                            {% if error %}
                                <div class=\"alert alert-danger\">{{ error.messageKey|trans(error.messageData, \x27security\x27) }}</div>
                            {% endif %}

                            {% if app.user %}
                                <div class=\"mb-3\">
                                    You are logged in as {{ app.user.userIdentifier }}, <a href=\"{{ logout_path() }}\">Logout</a>
                                </div>
                            {% endif %}

                            <div class=\"mb-3\">
                                <label for=\"email\" class=\"form-label form-label-custom\">Email address</label>
                                <div class=\"input-icon-wrap\">
                                    <i class=\"fa-regular fa-envelope input-icon\"></i>
                                    <input
                                        type=\"email\"
                                        value=\"{{ last_username }}\"
                                        name=\"_username\"
                                        id=\"username\"
                                        class=\"form-control form-control-custom\"
                                        autocomplete=\"email\"
                                        aria-label=\"Email address\"
                                        required
                                        autofocus
                                    >

                                </div>
                            </div>

                            <div class=\"mb-3\">
                                <div class=\"d-flex justify-content-between align-items-center mb-2\">
                                    <label for=\"password\" class=\"form-label form-label-custom mb-0\">Password</label>
                                    <a href=\"#\" class=\"text-primary-app text-decoration-none fw-medium\" style=\"font-size: 0.875rem;\">
                                        Forgot password?
                                    </a>
                                </div>

                                <div class=\"input-icon-wrap\">
                                    <i class=\"fa-solid fa-lock input-icon\"></i>
                                    <input
                                        type=\"password\"
                                        name=\"_password\"
                                        id=\"password\"
                                        class=\"form-control form-control-custom\"
                                        autocomplete=\"current-password\"
                                        aria-label=\"Password\"
                                        required
                                    >

                                </div>
                            </div>

                            <input type=\"hidden\" name=\"_csrf_token\" data-controller=\"csrf-protection\" value=\"{{ csrf_token(\x27authenticate\x27) }}\">

                            <div class=\"d-flex justify-content-between align-items-center mb-4\">
                                <div class=\"form-check\">
                                    <input class=\"form-check-input\" type=\"checkbox\" id=\"_remember_me\">
                                    <label class=\"form-check-label text-muted-app\" for=\"_remember_me\" style=\"font-size: 0.875rem;\">
                                        Remember me
                                    </label>
                                </div>
                            </div>

                            <button type=\"submit\" class=\"btn btn-auth-primary w-100 mb-4\">
                                Log in
                            </button>

                            <div class=\"divider-auth mb-4\">
                                <span>or continue with</span>
                            </div>

                            <div class=\"row g-3 mb-4\">
                                <div class=\"col-12 col-sm-6\">
                                    <button type=\"button\" class=\"btn btn-auth-social w-100\">
                                        <i class=\"fa-brands fa-google me-2\"></i>
                                        Google
                                    </button>
                                </div>
                                <div class=\"col-12 col-sm-6\">
                                    <button type=\"button\" class=\"btn btn-auth-social w-100\">
                                        <i class=\"fa-brands fa-microsoft me-2\"></i>
                                        Microsoft
                                    </button>
                                </div>
                            </div>

                            <p class=\"text-center text-muted-app mb-0\" style=\"font-size: 0.95rem;\">
                                Don’t have an account?
                                <a href=\"#\" class=\"text-primary-app text-decoration-none fw-semibold\">Create one</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
{% endblock %}
", "security/login.html.twig", "/home/ahmed/workspace/www/bookingapp/symfony/templates/security/login.html.twig");
    }
}
