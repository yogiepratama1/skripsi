<?php

/* layout-footer.html */
class __TwigTemplate_7a25c528a66c4a92a5303c593807b878208ca3ddfc874f844ed7273987a3481b extends Twig_Template
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
        echo "<script type=\"text/javascript\">
var site_url = \"";
        // line 2
        echo twig_escape_filter($this->env, site_url(), "html", null, true);
        echo "\";
var base_url = \"";
        // line 3
        echo twig_escape_filter($this->env, base_url(), "html", null, true);
        echo "\";
</script>
<script src=\"";
        // line 5
        echo twig_escape_filter($this->env, base_url("assets/comp/jquery/jquery.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
<script src=\"";
        // line 6
        echo twig_escape_filter($this->env, base_url("assets/comp/jquery/jquery-ui-1.10.1.custom.min.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
<script data-pace-options='{ \"ajax\": false }' src=\"";
        // line 7
        echo twig_escape_filter($this->env, base_url("assets/comp/pace/pace.min.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
<script src=\"";
        // line 8
        echo twig_escape_filter($this->env, base_url("assets/comp/offline/offline.min.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
<script src=\"";
        // line 9
        echo twig_escape_filter($this->env, base_url("assets/comp/bootstrap/js/bootstrap.min.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>";
        // line 10
        echo (isset($context["comp_js"]) ? $context["comp_js"] : null);
        echo "
<script src=\"";
        // line 11
        echo twig_escape_filter($this->env, (isset($context["base_url_theme"]) ? $context["base_url_theme"] : null), "html", null, true);
        echo "scripts/script.js\" type=\"text/javascript\"></script>
";
    }

    public function getTemplateName()
    {
        return "layout-footer.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  54 => 11,  26 => 3,  22 => 2,  50 => 10,  46 => 9,  43 => 8,  39 => 7,  27 => 4,  19 => 1,  123 => 50,  118 => 35,  113 => 6,  107 => 4,  102 => 51,  100 => 50,  98 => 49,  90 => 44,  87 => 43,  78 => 36,  76 => 35,  67 => 26,  62 => 24,  60 => 23,  51 => 18,  47 => 9,  35 => 6,  33 => 6,  31 => 5,  28 => 4,  23 => 3,  130 => 53,  124 => 49,  108 => 36,  105 => 35,  99 => 32,  92 => 27,  89 => 26,  86 => 25,  82 => 22,  74 => 19,  70 => 18,  66 => 17,  64 => 16,  52 => 14,  48 => 13,  44 => 10,  42 => 9,  40 => 8,  37 => 7,  32 => 4,  29 => 3,);
    }
}
