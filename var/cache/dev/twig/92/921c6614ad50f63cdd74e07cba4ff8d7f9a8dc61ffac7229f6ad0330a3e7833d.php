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

/* adminTemplate/adminEtudiantTemplate/index.html.twig */
class __TwigTemplate_3fe046e3aae3d907f156cdb41e7b5ff6c4ed15130d0a9b8385e00880be692ede extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "adminTemplate/adminEtudiantTemplate/index.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "adminTemplate/adminEtudiantTemplate/index.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "adminTemplate/adminEtudiantTemplate/index.html.twig", 1);
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

        echo "Gérer les étudiants";
        
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
        <h1>Gérer les étudiants</h1>
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
            <th>Nom</th>
            <th>Prenom</th>
            <th>Email</th>
            <th>Groupe</th>
        </tr>
        </thead>
        <tbody>
        
        ";
        // line 29
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["etudiants"]) || array_key_exists("etudiants", $context) ? $context["etudiants"] : (function () { throw new RuntimeError('Variable "etudiants" does not exist.', 29, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["etudiant"]) {
            // line 30
            echo "            <tr>
                <td>";
            // line 31
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["etudiant"], "nom", [], "any", false, false, false, 31), "html", null, true);
            echo "</td>
                <td>";
            // line 32
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["etudiant"], "prenom", [], "any", false, false, false, 32), "html", null, true);
            echo "</td>
                <td>";
            // line 33
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["etudiant"], "email", [], "any", false, false, false, 33), "html", null, true);
            echo "</td>
                <td>";
            // line 34
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["etudiant"], "groupe", [], "any", false, false, false, 34), "html", null, true);
            echo "</td>
                <td> 
                    <a href=\"";
            // line 36
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_edit_etudiant", ["id" => twig_get_attribute($this->env, $this->source, $context["etudiant"], "id", [], "any", false, false, false, 36)]), "html", null, true);
            echo "\" class=\"btn btn-secondary\">Editer</a>
                    
                    <form method=\"post\" action =\" ";
            // line 38
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_delete_etudiant", ["id" => twig_get_attribute($this->env, $this->source, $context["etudiant"], "id", [], "any", false, false, false, 38)]), "html", null, true);
            echo "\" style  = \"display: inline-block\" onsubmit = \"return confirm ('Vous allez supprimer un étudiant !')\">
                        <input type = \"hidden\" name = \"_method\" value = \"DELETE\">
                        <input type = \"hidden\" name = \"_token\" value = \"";
            // line 40
            echo twig_escape_filter($this->env, $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . twig_get_attribute($this->env, $this->source, $context["etudiant"], "id", [], "any", false, false, false, 40))), "html", null, true);
            echo "\">
                        <button class = \"btn btn-danger\"> Supprimer </button>
                    </form>

                </td>
                </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['etudiant'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 47
        echo "        </tbody>
        </table>

        <div class = \"text-right\">
            <a href = \"";
        // line 51
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_inscription_etudiant");
        echo "\" class=\"btn btn-primary\" >Créer un étudiant </a>
        </div>

    </div>
    
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "adminTemplate/adminEtudiantTemplate/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  179 => 51,  173 => 47,  160 => 40,  155 => 38,  150 => 36,  145 => 34,  141 => 33,  137 => 32,  133 => 31,  130 => 30,  126 => 29,  112 => 17,  103 => 14,  100 => 13,  96 => 12,  88 => 6,  78 => 5,  59 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"base.html.twig\" %}

{% block title 'Gérer les étudiants' %}

{% block body %}
    <div class=\"container mt-4\">

    <div class=\"jumbotron text-center\">
        <h1>Gérer les étudiants</h1>
    </div>

    {% for message in app.flashes('success') %}
        <div class = \"alert alert-success\">
            {{ message }}
        </div>
    {% endfor %}

    <table class=\"table table-striped\">
        <thead>
        <tr>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Email</th>
            <th>Groupe</th>
        </tr>
        </thead>
        <tbody>
        
        {% for etudiant in etudiants %}
            <tr>
                <td>{{ etudiant.nom }}</td>
                <td>{{ etudiant.prenom }}</td>
                <td>{{ etudiant.email }}</td>
                <td>{{ etudiant.groupe }}</td>
                <td> 
                    <a href=\"{{ path('admin_edit_etudiant', {id: etudiant.id}) }}\" class=\"btn btn-secondary\">Editer</a>
                    
                    <form method=\"post\" action =\" {{ path ('admin_delete_etudiant', {id: etudiant.id }) }}\" style  = \"display: inline-block\" onsubmit = \"return confirm ('Vous allez supprimer un étudiant !')\">
                        <input type = \"hidden\" name = \"_method\" value = \"DELETE\">
                        <input type = \"hidden\" name = \"_token\" value = \"{{ csrf_token('delete' ~ etudiant.id) }}\">
                        <button class = \"btn btn-danger\"> Supprimer </button>
                    </form>

                </td>
                </tr>
        {% endfor %}
        </tbody>
        </table>

        <div class = \"text-right\">
            <a href = \"{{ path('admin_inscription_etudiant') }}\" class=\"btn btn-primary\" >Créer un étudiant </a>
        </div>

    </div>
    
{% endblock %}", "adminTemplate/adminEtudiantTemplate/index.html.twig", "C:\\wamp64\\www\\PTUT2\\templates\\adminTemplate\\adminEtudiantTemplate\\index.html.twig");
    }
}
