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

/* registration/register.html.twig */
class __TwigTemplate_a92647d29f04816dae05148e8234aff8 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "registration/register.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "registration/register.html.twig"));

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

        yield "Register";
        
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

        yield "register-page";
        
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
                                <i class=\"fa-solid fa-user-plus\"></i>
                                Get started
                            </span>
                            <h1 class=\"fw-bold text-app mb-2\" style=\"font-size: clamp(2rem, 4vw, 2.75rem); line-height: 1.1;\">
                                Create your account
                            </h1>
                            <p class=\"text-muted-app mb-0\" style=\"font-size: 1rem;\">
                                Sign up to book spaces, manage your team, and access exclusive rates.
                            </p>
                        </div>

                        ";
        // line 26
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 26, $this->source); })()), "flashes", ["verify_email_error"], "method", false, false, false, 26));
        foreach ($context['_seq'] as $context["_key"] => $context["flash_error"]) {
            // line 27
            yield "                            <div class=\"alert alert-danger\" role=\"alert\">";
            yield (string) $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["flash_error"], "html", null, true);
            yield "</div>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['flash_error'], $context['_parent']);
        $context = array_intersect_key($context, $_parent);
        $context += $_parent;
        // line 29
        yield "
                        ";
        // line 30
        yield (string)         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 30, $this->source); })()), 'form_start');
        yield "
                        ";
        // line 31
        yield (string) $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 31, $this->source); })()), 'errors');
        yield "

                        <div class=\"row g-3 mb-3\">
                            <div class=\"col-12 col-sm-6\">
                                ";
        // line 35
        yield (string) $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 35, $this->source); })()), "firstName", [], "any", false, false, false, 35), 'label', ["label_attr" => ["class" => "form-label form-label-custom"]]);
        yield "
                                <div class=\"input-icon-wrap\">
                                    <i class=\"fa-regular fa-user input-icon\"></i>
                                    ";
        // line 38
        yield (string) $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 38, $this->source); })()), "firstName", [], "any", false, false, false, 38), 'widget', ["attr" => ["class" => "form-control form-control-custom", "placeholder" => "First name", "aria-label" => "First name"]]);
        // line 44
        yield "
                                </div>
                                ";
        // line 46
        yield (string) $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 46, $this->source); })()), "firstName", [], "any", false, false, false, 46), 'errors');
        yield "
                            </div>

                            <div class=\"col-12 col-sm-6\">
                                ";
        // line 50
        yield (string) $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 50, $this->source); })()), "lastName", [], "any", false, false, false, 50), 'label', ["label_attr" => ["class" => "form-label form-label-custom"]]);
        yield "
                                <div class=\"input-icon-wrap\">
                                    <i class=\"fa-solid fa-id-card input-icon\"></i>
                                    ";
        // line 53
        yield (string) $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 53, $this->source); })()), "lastName", [], "any", false, false, false, 53), 'widget', ["attr" => ["class" => "form-control form-control-custom", "placeholder" => "Last name", "aria-label" => "Last name"]]);
        // line 59
        yield "
                                </div>

                                ";
        // line 62
        yield (string) $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 62, $this->source); })()), "lastName", [], "any", false, false, false, 62), 'errors');
        yield "
                            </div>
                        </div>

                        <div class=\"mb-3\">
                            ";
        // line 67
        yield (string) $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 67, $this->source); })()), "email", [], "any", false, false, false, 67), 'label', ["label_attr" => ["class" => "form-label form-label-custom"], "label" => "Email address"]);
        yield "
                            <div class=\"input-icon-wrap\">
                                <i class=\"fa-regular fa-envelope input-icon\"></i>
                                ";
        // line 70
        yield (string) $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 70, $this->source); })()), "email", [], "any", false, false, false, 70), 'widget', ["attr" => ["class" => "form-control form-control-custom", "placeholder" => "name@company.com", "aria-label" => "Email address"]]);
        // line 76
        yield "
                            </div>

                            ";
        // line 79
        yield (string) $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 79, $this->source); })()), "email", [], "any", false, false, false, 79), 'errors');
        yield "
                        </div>

                        <div class=\"mb-3\">
                            ";
        // line 83
        yield (string) $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 83, $this->source); })()), "plainPassword", [], "any", false, false, false, 83), 'label', ["label_attr" => ["class" => "form-label form-label-custom"], "label" => "Password"]);
        yield "
                            <div class=\"input-icon-wrap\">
                                <i class=\"fa-solid fa-lock input-icon\"></i>
                                ";
        // line 86
        yield (string) $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 86, $this->source); })()), "plainPassword", [], "any", false, false, false, 86), 'widget', ["attr" => ["class" => "form-control form-control-custom", "placeholder" => "Create a password", "aria-label" => "Password"]]);
        // line 92
        yield "
                            </div>

                            ";
        // line 95
        yield (string) $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 95, $this->source); })()), "plainPassword", [], "any", false, false, false, 95), 'errors');
        yield "
                        </div>

                        <div class=\"mb-4\">
                            <div class=\"form-check\">
                                ";
        // line 100
        yield (string) $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 100, $this->source); })()), "agreeTerms", [], "any", false, false, false, 100), 'widget', ["attr" => ["class" => "form-check-input"]]);
        yield "
                                ";
        // line 101
        yield (string) $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 101, $this->source); })()), "agreeTerms", [], "any", false, false, false, 101), 'label', ["label_attr" => ["class" => "form-check-label text-muted-app", "style" => "font-size: 0.875rem;"], "label" => "I agree to the Terms of Service and Privacy Policy"]);
        // line 103
        yield "
                            </div>

                            ";
        // line 106
        yield (string) $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 106, $this->source); })()), "agreeTerms", [], "any", false, false, false, 106), 'errors');
        yield "
                        </div>

                        <button type=\"submit\" class=\"btn btn-auth-primary w-100 mb-4\">
                            Create account
                        </button>

                        <p class=\"text-center text-muted-app mb-0\" style=\"font-size: 0.95rem;\">
                            Already have an account?
                            <a href=\"";
        // line 115
        yield (string) $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_login");
        yield "\" class=\"text-primary-app text-decoration-none fw-semibold\">Log in</a>
                        </p>

                        ";
        // line 118
        yield (string)         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 118, $this->source); })()), 'form_end');
        yield "
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
        return "registration/register.html.twig";
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
        return array (  283 => 118,  277 => 115,  265 => 106,  260 => 103,  258 => 101,  254 => 100,  246 => 95,  241 => 92,  239 => 86,  233 => 83,  226 => 79,  221 => 76,  219 => 70,  213 => 67,  205 => 62,  200 => 59,  198 => 53,  192 => 50,  185 => 46,  181 => 44,  179 => 38,  173 => 35,  166 => 31,  162 => 30,  159 => 29,  149 => 27,  145 => 26,  125 => 8,  112 => 7,  89 => 5,  66 => 3,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends \x27base.html.twig\x27 %}

{% block title %}Register{% endblock %}

{% block body_class %}register-page{% endblock %}

{% block body %}
    <section class=\"auth-section py-5\">
        <div class=\"container-xl px-4\">
            <div class=\"row justify-content-center\">
                <div class=\"col-12 col-md-10 col-lg-7 col-xl-5\">
                    <div class=\"auth-card p-4 p-md-5\">
                        <div class=\"mb-4 text-center\">
                            <span class=\"auth-badge mb-3\">
                                <i class=\"fa-solid fa-user-plus\"></i>
                                Get started
                            </span>
                            <h1 class=\"fw-bold text-app mb-2\" style=\"font-size: clamp(2rem, 4vw, 2.75rem); line-height: 1.1;\">
                                Create your account
                            </h1>
                            <p class=\"text-muted-app mb-0\" style=\"font-size: 1rem;\">
                                Sign up to book spaces, manage your team, and access exclusive rates.
                            </p>
                        </div>

                        {% for flash_error in app.flashes(\x27verify_email_error\x27) %}
                            <div class=\"alert alert-danger\" role=\"alert\">{{ flash_error }}</div>
                        {% endfor %}

                        {{ form_start(registrationForm) }}
                        {{ form_errors(registrationForm) }}

                        <div class=\"row g-3 mb-3\">
                            <div class=\"col-12 col-sm-6\">
                                {{ form_label(registrationForm.firstName, null, {\x27label_attr\x27: {\x27class\x27: \x27form-label form-label-custom\x27}}) }}
                                <div class=\"input-icon-wrap\">
                                    <i class=\"fa-regular fa-user input-icon\"></i>
                                    {{ form_widget(registrationForm.firstName, {
                                        \x27attr\x27: {
                                            \x27class\x27: \x27form-control form-control-custom\x27,
                                            \x27placeholder\x27: \x27First name\x27,
                                            \x27aria-label\x27: \x27First name\x27
                                        }
                                    }) }}
                                </div>
                                {{ form_errors(registrationForm.firstName) }}
                            </div>

                            <div class=\"col-12 col-sm-6\">
                                {{ form_label(registrationForm.lastName, null, {\x27label_attr\x27: {\x27class\x27: \x27form-label form-label-custom\x27}}) }}
                                <div class=\"input-icon-wrap\">
                                    <i class=\"fa-solid fa-id-card input-icon\"></i>
                                    {{ form_widget(registrationForm.lastName, {
                                        \x27attr\x27: {
                                            \x27class\x27: \x27form-control form-control-custom\x27,
                                            \x27placeholder\x27: \x27Last name\x27,
                                            \x27aria-label\x27: \x27Last name\x27
                                        }
                                    }) }}
                                </div>

                                {{ form_errors(registrationForm.lastName) }}
                            </div>
                        </div>

                        <div class=\"mb-3\">
                            {{ form_label(registrationForm.email, \x27Email address\x27, {\x27label_attr\x27: {\x27class\x27: \x27form-label form-label-custom\x27}}) }}
                            <div class=\"input-icon-wrap\">
                                <i class=\"fa-regular fa-envelope input-icon\"></i>
                                {{ form_widget(registrationForm.email, {
                                    \x27attr\x27: {
                                        \x27class\x27: \x27form-control form-control-custom\x27,
                                        \x27placeholder\x27: \x27name@company.com\x27,
                                        \x27aria-label\x27: \x27Email address\x27
                                    }
                                }) }}
                            </div>

                            {{ form_errors(registrationForm.email) }}
                        </div>

                        <div class=\"mb-3\">
                            {{ form_label(registrationForm.plainPassword, \x27Password\x27, {\x27label_attr\x27: {\x27class\x27: \x27form-label form-label-custom\x27}}) }}
                            <div class=\"input-icon-wrap\">
                                <i class=\"fa-solid fa-lock input-icon\"></i>
                                {{ form_widget(registrationForm.plainPassword, {
                                    \x27attr\x27: {
                                        \x27class\x27: \x27form-control form-control-custom\x27,
                                        \x27placeholder\x27: \x27Create a password\x27,
                                        \x27aria-label\x27: \x27Password\x27
                                    }
                                }) }}
                            </div>

                            {{ form_errors(registrationForm.plainPassword) }}
                        </div>

                        <div class=\"mb-4\">
                            <div class=\"form-check\">
                                {{ form_widget(registrationForm.agreeTerms, {\x27attr\x27: {\x27class\x27: \x27form-check-input\x27}}) }}
                                {{ form_label(registrationForm.agreeTerms, \x27I agree to the Terms of Service and Privacy Policy\x27, {
                                    \x27label_attr\x27: {\x27class\x27: \x27form-check-label text-muted-app\x27, \x27style\x27: \x27font-size: 0.875rem;\x27}
                                }) }}
                            </div>

                            {{ form_errors(registrationForm.agreeTerms) }}
                        </div>

                        <button type=\"submit\" class=\"btn btn-auth-primary w-100 mb-4\">
                            Create account
                        </button>

                        <p class=\"text-center text-muted-app mb-0\" style=\"font-size: 0.95rem;\">
                            Already have an account?
                            <a href=\"{{ path(\x27app_login\x27) }}\" class=\"text-primary-app text-decoration-none fw-semibold\">Log in</a>
                        </p>

                        {{ form_end(registrationForm) }}
                    </div>
                </div>
            </div>
        </div>
    </section>
{% endblock %}
", "registration/register.html.twig", "/var/www/html/app/templates/registration/register.html.twig");
    }
}
