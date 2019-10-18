<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* adminTemplate/adminGroupeTemplate/index.html.twig */
class __TwigTemplate_fbb82a74709b25c41c9516187c8c20b0997b6236e30a294e2b3d8316abed25bd extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "adminTemplate/adminGroupeTemplate/index.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "adminTemplate/adminGroupeTemplate/index.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "adminTemplate/adminGroupeTemplate/index.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "La liste des groupes";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 5
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 6
        echo "    <div class=\"container mt-4\">

    <div class=\"jumbotron text-center\">
        <h1> La liste des groupes</h1>
    </div>

    ";
        // line 12
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 12, $this->source); })()), "flashes", [0 => "success"], "method", false, false, false, 12));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 13
            echo "        <div class = \"alert alert-success\">
            ";
            // line 14
            echo twig_escape_filter($this->env, $context["message"], "html", null, true);
            echo "
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 17
        echo "
    <table class=\"table table-striped\">
        <thead>
        <tr>
            <th>Titre</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        
        ";
        // line 27
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["groupe"]) || array_key_exists("groupe", $context) ? $context["groupe"] : (function () { throw new RuntimeError('Variable "groupe" does not exist.', 27, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["groupes"]) {
            // line 28
            echo "            <tr>
                <td> ";
            // line 29
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["groupes"], "sujet", [], "any", false, false, false, 29), "html", null, true);
            echo " </td>
                <td> 
                    <a href=\"";
            // line 31
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_edit_groupe", ["id" => twig_get_attribute($this->env, $this->source, $context["groupes"], "id", [], "any", false, false, false, 31)]), "html", null, true);
            echo "\" class=\"btn btn-secondary\">Editer</a>
                    
                    <form method=\"post\" action =\" ";
            // line 33
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_delete_groupe", ["id" => twig_get_attribute($this->env, $this->source, $context["groupes"], "id", [], "any", false, false, false, 33)]), "html", null, true);
            echo "\" style  = \"display: inline-block\" onsubmit = \"return confirm ('Vous allez supprimer un groupe !')\">
                        <input type = \"hidden\" name = \"_method\" value = \"DELETE\">
                        <input type = \"hidden\" name = \"_token\" value = \"";
            // line 35
            echo twig_escape_filter($this->env, $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . twig_get_attribute($this->env, $this->source, $context["groupes"], "id", [], "any", false, false, false, 35))), "html", null, true);
            echo "\">
                        <button class = \"btn btn-danger\"> Supprimer </button>
                    </form>

                </td>
                </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['groupes'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 42
        echo "        </tbody>
        </table>

        <div class = \"text-right\">
            <a href = \"";
        // line 46
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("fos_user_registration_register");
        echo "\" class=\"btn btn-primary\" > Créer un groupe </a>
        </div>

    </div>
    
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "adminTemplate/adminGroupeTemplate/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  165 => 46,  159 => 42,  146 => 35,  141 => 33,  136 => 31,  131 => 29,  128 => 28,  124 => 27,  112 => 17,  103 => 14,  100 => 13,  96 => 12,  88 => 6,  78 => 5,  59 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"base.html.twig\" %}

{% block title 'La liste des groupes' %}

{% block body %}
    <div class=\"container mt-4\">

    <div class=\"jumbotron text-center\">
        <h1> La liste des groupes</h1>
    </div>

    {% for message in app.flashes('success') %}
        <div class = \"alert alert-success\">
            {{ message }}
        </div>
    {% endfor %}

    <table class=\"table table-striped\">
        <thead>
        <tr>
            <th>Titre</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        
        {% for groupes in groupe %}
            <tr>
                <td> {{ groupes.sujet }} </td>
                <td> 
                    <a href=\"{{ path('admin_edit_groupe', {id: groupes.id}) }}\" class=\"btn btn-secondary\">Editer</a>
                    
                    <form method=\"post\" action =\" {{ path ('admin_delete_groupe', {id: groupes.id }) }}\" style  = \"display: inline-block\" onsubmit = \"return confirm ('Vous allez supprimer un groupe !')\">
                        <input type = \"hidden\" name = \"_method\" value = \"DELETE\">
                        <input type = \"hidden\" name = \"_token\" value = \"{{ csrf_token('delete' ~ groupes.id) }}\">
                        <button class = \"btn btn-danger\"> Supprimer </button>
                    </form>

                </td>
                </tr>
        {% endfor %}
        </tbody>
        </table>

        <div class = \"text-right\">
            <a href = \"{{ path('fos_user_registration_register') }}\" class=\"btn btn-primary\" > Créer un groupe </a>
        </div>

    </div>
    
{% endblock %}", "adminTemplate/adminGroupeTemplate/index.html.twig", "C:\\wamp64\\www\\PTUT2\\templates\\adminTemplate\\adminGroupeTemplate\\index.html.twig");
    }
}
