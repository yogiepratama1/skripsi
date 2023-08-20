<?php

/* sidebar-menu.html */
class __TwigTemplate_87c2f930554727392ebc8ce03dcffbd8dd38ed13abfdaaa4a873949435e12a5e extends Twig_Template
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
        // line 2
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["list_menu"]) ? $context["list_menu"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["menus"]) {
            // line 3
            echo "    <ul class=\"widget widget-menu unstyled\">";
            // line 4
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["menus"]) ? $context["menus"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["menu"]) {
                // line 5
                echo "        <li>";
                echo (isset($context["menu"]) ? $context["menu"] : null);
                echo "</li>";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['menu'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 7
            echo "    </ul>";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['menus'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "sidebar-menu.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  37 => 7,  29 => 5,  25 => 4,  27 => 4,  19 => 2,  199 => 81,  194 => 6,  181 => 101,  179 => 100,  177 => 99,  169 => 94,  166 => 93,  153 => 82,  151 => 81,  148 => 78,  146 => 77,  139 => 71,  137 => 70,  118 => 53,  111 => 51,  104 => 48,  99 => 45,  97 => 44,  92 => 41,  90 => 40,  78 => 33,  76 => 32,  71 => 30,  69 => 29,  67 => 27,  46 => 16,  35 => 7,  33 => 6,  23 => 3,  359 => 201,  348 => 191,  340 => 188,  337 => 187,  333 => 186,  324 => 178,  313 => 174,  309 => 172,  305 => 171,  298 => 165,  287 => 161,  283 => 159,  279 => 158,  272 => 152,  265 => 147,  260 => 143,  258 => 142,  256 => 141,  254 => 140,  242 => 128,  234 => 125,  231 => 124,  227 => 123,  220 => 117,  213 => 112,  208 => 108,  206 => 107,  204 => 100,  202 => 105,  195 => 99,  188 => 4,  184 => 94,  171 => 83,  163 => 80,  160 => 79,  156 => 78,  144 => 68,  140 => 67,  134 => 64,  130 => 63,  124 => 60,  120 => 59,  114 => 52,  110 => 55,  106 => 49,  95 => 44,  84 => 36,  73 => 28,  66 => 23,  64 => 22,  62 => 21,  58 => 20,  54 => 15,  52 => 14,  50 => 17,  45 => 11,  39 => 10,  31 => 5,  28 => 4,);
    }
}
