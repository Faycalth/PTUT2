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

/* reunionTemplate/myproject.html.twig */
class __TwigTemplate_2252a42932e41c24f7b35884ce12883c0c9834192d55def5a173cd956848f1f7 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'stylesheets' => [$this, 'block_stylesheets'],
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "reunionTemplate/myproject.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "reunionTemplate/myproject.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "reunionTemplate/myproject.html.twig", 1);
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

        echo "Bienvenue sur votre projet !";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 5
    public function block_stylesheets($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        echo " <link rel=\"stylesheet\" href=\"myproject.css\">";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 7
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 8
        echo "<div class=\"table\">
  <h2 class=\"heading\">
    À faire
  </h2>
  <div class=\"block\">
    <ul class=\"options\">
      <li>
        <a class=\"nav-link\" href=\"\">Tâche H</a>
      </li>
    </ul>
</div>
<div class=\"block\">
    <ul class=\"options\">
       <li>
        <a class=\"nav-link\" href=\"\">Tâche G</a>
      </li>
    </ul>
</div>
<div class=\"block\">   
    <ul class=\"options\">
      <li>
        <a class=\"nav-link\" href=\"\">Tâche F</a>
      </li>
    </ul>
</div>
</div>

<div class=\"table\">
  <h2 class=\"heading\">
    En cours
  </h2>
  <div class=\"block\"> 
    <ul class=\"options\">
      <li>
        <a class=\"nav-link\" href=\"\">Tâche E</a>
      </li>
    </ul>
</div>
<div class=\"block\">
    <ul class=\"options\">
      <li>
        <a class=\"nav-link\" href=\"\">Tâche D</a>
      </li>
    </ul>
</div>
<div class=\"block\">
    <ul class=\"options\">
        <li>
        <a class=\"nav-link\" href=\"\">Tâche C</a>
      </li>
    </ul>
 </p>
</div>
</div>


<div class=\"table\">

  <h2 class=\"heading\">
      Fait
    </a>
  </h2>
  <div class=\"block\">
    <ul class=\"options\">
      <li>
        <a class=\"nav-link\" href=\"\">Tâche B</a>
      </li>
    </ul>
</div>
<div class=\"block\">
    <ul class=\"options\">
      <li>
        <a class=\"nav-link\" href=\"\">Tâche A</a>
      </li>
    </ul>
</div>
</div>

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "reunionTemplate/myproject.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  108 => 8,  98 => 7,  79 => 5,  60 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Bienvenue sur votre projet !{% endblock %}

{% block stylesheets %} <link rel=\"stylesheet\" href=\"myproject.css\">{% endblock %}

{% block body %}
<div class=\"table\">
  <h2 class=\"heading\">
    À faire
  </h2>
  <div class=\"block\">
    <ul class=\"options\">
      <li>
        <a class=\"nav-link\" href=\"\">Tâche H</a>
      </li>
    </ul>
</div>
<div class=\"block\">
    <ul class=\"options\">
       <li>
        <a class=\"nav-link\" href=\"\">Tâche G</a>
      </li>
    </ul>
</div>
<div class=\"block\">   
    <ul class=\"options\">
      <li>
        <a class=\"nav-link\" href=\"\">Tâche F</a>
      </li>
    </ul>
</div>
</div>

<div class=\"table\">
  <h2 class=\"heading\">
    En cours
  </h2>
  <div class=\"block\"> 
    <ul class=\"options\">
      <li>
        <a class=\"nav-link\" href=\"\">Tâche E</a>
      </li>
    </ul>
</div>
<div class=\"block\">
    <ul class=\"options\">
      <li>
        <a class=\"nav-link\" href=\"\">Tâche D</a>
      </li>
    </ul>
</div>
<div class=\"block\">
    <ul class=\"options\">
        <li>
        <a class=\"nav-link\" href=\"\">Tâche C</a>
      </li>
    </ul>
 </p>
</div>
</div>


<div class=\"table\">

  <h2 class=\"heading\">
      Fait
    </a>
  </h2>
  <div class=\"block\">
    <ul class=\"options\">
      <li>
        <a class=\"nav-link\" href=\"\">Tâche B</a>
      </li>
    </ul>
</div>
<div class=\"block\">
    <ul class=\"options\">
      <li>
        <a class=\"nav-link\" href=\"\">Tâche A</a>
      </li>
    </ul>
</div>
</div>

{% endblock %}

", "reunionTemplate/myproject.html.twig", "C:\\wamp64\\www\\PTUT2\\templates\\reunionTemplate\\myproject.html.twig");
    }
}
