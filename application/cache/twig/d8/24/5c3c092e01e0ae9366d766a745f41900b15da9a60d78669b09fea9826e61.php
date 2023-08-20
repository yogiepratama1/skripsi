<?php

/* layout-header.html */
class __TwigTemplate_d8245c3c092e01e0ae9366d766a745f41900b15da9a60d78669b09fea9826e61 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
<link type=\"text/css\" href=\"";
        // line 3
        echo twig_escape_filter($this->env, base_url("assets/comp/bootstrap/css/bootstrap.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
<link type=\"text/css\" href=\"";
        // line 4
        echo twig_escape_filter($this->env, base_url("assets/comp/bootstrap/css/bootstrap-responsive.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
<link type=\"text/css\" href=\"";
        // line 5
        echo twig_escape_filter($this->env, (isset($context["base_url_theme"]) ? $context["base_url_theme"] : null), "html", null, true);
        echo "css/theme.css\" rel=\"stylesheet\">
<link type=\"text/css\" href=\"";
        // line 6
        echo twig_escape_filter($this->env, base_url("assets/comp/font-awesome/css/font-awesome.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
<link type=\"text/css\" href=\"";
        // line 7
        echo twig_escape_filter($this->env, base_url("assets/comp/pace/flash.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
<link type=\"text/css\" href=\"";
        // line 8
        echo twig_escape_filter($this->env, base_url("assets/comp/offline/offline-theme-chrome.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">";
        // line 9
        echo (isset($context["comp_css"]) ? $context["comp_css"] : null);
        echo "
<link rel=\"shortcut icon\" type=\"image/x-icon\" href=\"";
        // line 10
        echo twig_escape_filter($this->env, (isset($context["favicon_url"]) ? $context["favicon_url"] : null), "html", null, true);
        echo "\">
";
    }

    public function getTemplateName()
    {
        return "layout-header.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  50 => 10,  46 => 9,  43 => 8,  39 => 7,  27 => 4,  19 => 1,  123 => 50,  118 => 35,  113 => 6,  107 => 4,  102 => 51,  100 => 50,  98 => 49,  90 => 44,  87 => 43,  78 => 36,  76 => 35,  67 => 26,  62 => 24,  60 => 23,  51 => 18,  47 => 17,  35 => 6,  33 => 6,  31 => 5,  28 => 4,  23 => 3,  130 => 53,  124 => 49,  108 => 36,  105 => 35,  99 => 32,  92 => 27,  89 => 26,  86 => 25,  82 => 22,  74 => 19,  70 => 18,  66 => 17,  64 => 16,  52 => 14,  48 => 13,  44 => 10,  42 => 9,  40 => 8,  37 => 7,  32 => 4,  29 => 3,);
    }
}
