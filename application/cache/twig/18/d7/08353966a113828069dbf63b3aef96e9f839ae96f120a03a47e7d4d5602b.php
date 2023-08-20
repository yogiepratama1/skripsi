<?php

/* layout-iframe.html */
class __TwigTemplate_18d708353966a113828069dbf63b3aef96e9f839ae96f120a03a47e7d4d5602b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'css' => array($this, 'block_css'),
            'content' => array($this, 'block_content'),
            'js' => array($this, 'block_js'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
    <head>
        <title>";
        // line 4
        $this->displayBlock('title', $context, $blocks);
        echo "</title>";
        // line 5
        $this->env->loadTemplate("layout-header.html")->display($context);
        // line 6
        $this->displayBlock('css', $context, $blocks);
        // line 7
        echo "    </head>

    <body onload=\"inIframe()\">

        <div id=\"body-content\">";
        // line 12
        $this->displayBlock('content', $context, $blocks);
        // line 13
        echo "        </div>";
        // line 15
        $this->env->loadTemplate("layout-footer.html")->display($context);
        // line 16
        $this->displayBlock('js', $context, $blocks);
        // line 17
        echo "
        <script type=\"text/javascript\">
            // cek diakses dengan iframe atau tidak
            function inIframe()
            {
                var is_iframe = true;
                try {
                    is_iframe = window.self !== window.top;
                } catch (e) {
                    is_iframe = true;
                }

                if (!is_iframe) {
                    \$(\"#body-content\").html('redirect...');
                    window.location.replace(site_url);
                }
            }
        </script>
    </body>
</html>
";
    }

    // line 4
    public function block_title($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, (isset($context["site_name"]) ? $context["site_name"] : null), "html", null, true);
    }

    // line 6
    public function block_css($context, array $blocks = array())
    {
    }

    // line 12
    public function block_content($context, array $blocks = array())
    {
    }

    // line 16
    public function block_js($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "layout-iframe.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  89 => 16,  84 => 12,  79 => 6,  73 => 4,  49 => 17,  43 => 13,  41 => 12,  35 => 7,  23 => 1,  155 => 83,  152 => 81,  149 => 79,  147 => 78,  142 => 75,  132 => 68,  125 => 64,  118 => 60,  111 => 56,  102 => 52,  93 => 46,  86 => 40,  82 => 39,  66 => 25,  61 => 23,  59 => 22,  56 => 21,  50 => 17,  47 => 16,  45 => 15,  39 => 9,  36 => 7,  33 => 6,  31 => 5,  28 => 4,);
    }
}
