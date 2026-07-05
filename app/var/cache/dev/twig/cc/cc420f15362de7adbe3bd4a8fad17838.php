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

/* partials/_footer.html.twig */
class __TwigTemplate_bf54d7fc5ba88c016977d0d9cb700943 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "partials/_footer.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "partials/_footer.html.twig"));

        // line 1
        yield "<footer id=\"footer\" class=\"bg-white border-top border-app pt-5 pb-4\">
    <div class=\"container-xl px-4\">
        <div class=\"row g-4 g-lg-5 mb-5 footer__row\">

            <!-- Brand column -->
            <div class=\"col-12 col-md-5 col-lg-5\">
                <div class=\"d-flex align-items-center mb-3\">
                    <div class=\"d-flex align-items-center justify-content-center rounded-2 me-3 bg-primary-app\"
                         style=\"width: 32px; height: 32px;\">
                        <i class=\"fa-solid fa-layer-group text-white\" style=\"font-size: 14px;\"></i>
                    </div>
                    <span class=\"fw-bold fs-5 tracking-tight text-app\">Bookingapp</span>
                </div>
                <p class=\"text-muted-app mb-4\" style=\"font-size: 0.875rem; max-width: 280px;\">
                    The modern platform to discover, book, and manage flexible workspaces globally.
                </p>
                <div class=\"d-flex gap-3\">
                    <a href=\"#\" class=\"social-link\"><i class=\"fa-brands fa-twitter\"></i></a>
                    <a href=\"#\" class=\"social-link\"><i class=\"fa-brands fa-linkedin\"></i></a>
                    <a href=\"#\" class=\"social-link\"><i class=\"fa-brands fa-instagram\"></i></a>
                </div>
            </div>

            <!-- Product -->
            <div class=\"col-6 col-md-2\">
                <h4 class=\"fw-semibold text-app mb-3\" style=\"font-size: 0.9375rem;\">Product</h4>
                <ul class=\"list-unstyled mb-0\">
                    <li class=\"mb-2\"><a href=\"#\" class=\"footer-link\">Find a Workspace</a></li>
                    <li class=\"mb-2\"><a href=\"#\" class=\"footer-link\">For Enterprise</a></li>
                    <li class=\"mb-2\"><a href=\"#\" class=\"footer-link\">Pricing</a></li>
                    <li><a href=\"#\" class=\"footer-link\">Changelog</a></li>
                </ul>
            </div>

            <!-- Company -->
            <div class=\"col-6 col-md-2\">
                <h4 class=\"fw-semibold text-app mb-3\" style=\"font-size: 0.9375rem;\">Company</h4>
                <ul class=\"list-unstyled mb-0\">
                    <li class=\"mb-2\"><a href=\"#\" class=\"footer-link\">About Us</a></li>
                    <li class=\"mb-2\"><a href=\"#\" class=\"footer-link\">Careers</a></li>
                    <li class=\"mb-2\"><a href=\"#\" class=\"footer-link\">Blog</a></li>
                    <li><a href=\"#\" class=\"footer-link\">Contact</a></li>
                </ul>
            </div>

            <!-- Legal -->
            <div class=\"col-6 col-md-2\">
                <h4 class=\"fw-semibold text-app mb-3\" style=\"font-size: 0.9375rem;\">Legal</h4>
                <ul class=\"list-unstyled mb-0\">
                    <li class=\"mb-2\"><a href=\"#\" class=\"footer-link\">Terms of Service</a></li>
                    <li class=\"mb-2\"><a href=\"#\" class=\"footer-link\">Privacy Policy</a></li>
                    <li><a href=\"#\" class=\"footer-link\">Cookie Policy</a></li>
                </ul>
            </div>

        </div>

        <div
            class=\"border-top border-app pt-4 d-flex flex-column flex-md-row justify-content-between align-items-center text-muted-app\"
            style=\"font-size: 0.875rem;\"
        >
            <p class=\"mb-0\">&copy; ";
        // line 62
        yield (string) $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate("now", "Y"), "html", null, true);
        yield " Bookingapp Inc. All rights reserved.</p>
            <div class=\"d-flex align-items-center gap-2 mt-3 mt-md-0\">
                <i class=\"fa-solid fa-globe\"></i>
                <span>English (US)</span>
                <span>•</span>
                <span>USD (\$)</span>
            </div>
        </div>
    </div>
</footer>
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
        return "partials/_footer.html.twig";
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
        return array (  112 => 62,  49 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<footer id=\"footer\" class=\"bg-white border-top border-app pt-5 pb-4\">
    <div class=\"container-xl px-4\">
        <div class=\"row g-4 g-lg-5 mb-5 footer__row\">

            <!-- Brand column -->
            <div class=\"col-12 col-md-5 col-lg-5\">
                <div class=\"d-flex align-items-center mb-3\">
                    <div class=\"d-flex align-items-center justify-content-center rounded-2 me-3 bg-primary-app\"
                         style=\"width: 32px; height: 32px;\">
                        <i class=\"fa-solid fa-layer-group text-white\" style=\"font-size: 14px;\"></i>
                    </div>
                    <span class=\"fw-bold fs-5 tracking-tight text-app\">Bookingapp</span>
                </div>
                <p class=\"text-muted-app mb-4\" style=\"font-size: 0.875rem; max-width: 280px;\">
                    The modern platform to discover, book, and manage flexible workspaces globally.
                </p>
                <div class=\"d-flex gap-3\">
                    <a href=\"#\" class=\"social-link\"><i class=\"fa-brands fa-twitter\"></i></a>
                    <a href=\"#\" class=\"social-link\"><i class=\"fa-brands fa-linkedin\"></i></a>
                    <a href=\"#\" class=\"social-link\"><i class=\"fa-brands fa-instagram\"></i></a>
                </div>
            </div>

            <!-- Product -->
            <div class=\"col-6 col-md-2\">
                <h4 class=\"fw-semibold text-app mb-3\" style=\"font-size: 0.9375rem;\">Product</h4>
                <ul class=\"list-unstyled mb-0\">
                    <li class=\"mb-2\"><a href=\"#\" class=\"footer-link\">Find a Workspace</a></li>
                    <li class=\"mb-2\"><a href=\"#\" class=\"footer-link\">For Enterprise</a></li>
                    <li class=\"mb-2\"><a href=\"#\" class=\"footer-link\">Pricing</a></li>
                    <li><a href=\"#\" class=\"footer-link\">Changelog</a></li>
                </ul>
            </div>

            <!-- Company -->
            <div class=\"col-6 col-md-2\">
                <h4 class=\"fw-semibold text-app mb-3\" style=\"font-size: 0.9375rem;\">Company</h4>
                <ul class=\"list-unstyled mb-0\">
                    <li class=\"mb-2\"><a href=\"#\" class=\"footer-link\">About Us</a></li>
                    <li class=\"mb-2\"><a href=\"#\" class=\"footer-link\">Careers</a></li>
                    <li class=\"mb-2\"><a href=\"#\" class=\"footer-link\">Blog</a></li>
                    <li><a href=\"#\" class=\"footer-link\">Contact</a></li>
                </ul>
            </div>

            <!-- Legal -->
            <div class=\"col-6 col-md-2\">
                <h4 class=\"fw-semibold text-app mb-3\" style=\"font-size: 0.9375rem;\">Legal</h4>
                <ul class=\"list-unstyled mb-0\">
                    <li class=\"mb-2\"><a href=\"#\" class=\"footer-link\">Terms of Service</a></li>
                    <li class=\"mb-2\"><a href=\"#\" class=\"footer-link\">Privacy Policy</a></li>
                    <li><a href=\"#\" class=\"footer-link\">Cookie Policy</a></li>
                </ul>
            </div>

        </div>

        <div
            class=\"border-top border-app pt-4 d-flex flex-column flex-md-row justify-content-between align-items-center text-muted-app\"
            style=\"font-size: 0.875rem;\"
        >
            <p class=\"mb-0\">&copy; {{ \"now\"|date(\"Y\") }} Bookingapp Inc. All rights reserved.</p>
            <div class=\"d-flex align-items-center gap-2 mt-3 mt-md-0\">
                <i class=\"fa-solid fa-globe\"></i>
                <span>English (US)</span>
                <span>•</span>
                <span>USD (\$)</span>
            </div>
        </div>
    </div>
</footer>
", "partials/_footer.html.twig", "/home/ahmed/workspace/www/bookingapp/symfony/templates/partials/_footer.html.twig");
    }
}
