<?php

/* edit-pengajar-username.html */
class __TwigTemplate_64767e7dd1c2c76e2346651e10d95c228f0b3ece0219bc41dce4514d3668155d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("layout-iframe.html");

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout-iframe.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "<h4>Edit Username</h4>";
        // line 5
        echo get_flashdata("edit");
        // line 7
        if ((is_demo_app() && ($this->getAttribute((isset($context["login"]) ? $context["login"] : null), "is_admin") == true))) {
            // line 8
            echo get_alert("warning", get_demo_msg());
        }
        // line 11
        echo form_open(((("pengajar/edit_username/" . (isset($context["status_id"]) ? $context["status_id"] : null)) . "/") . (isset($context["pengajar_id"]) ? $context["pengajar_id"] : null)));
        echo "
<input type=\"hidden\" name=\"login_id\" value=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["login"]) ? $context["login"] : null), "id"), "html", null, true);
        echo "\">
<table class=\"table table-striped\">
    <tbody>
        <tr>
            <td>
                <input type=\"text\" name=\"username\" value=\"";
        // line 17
        echo twig_escape_filter($this->env, set_value("username", $this->getAttribute((isset($context["login"]) ? $context["login"] : null), "username")), "html", null, true);
        echo "\">
                <br>";
        // line 18
        echo form_error("username");
        echo "
            </td>";
        // line 20
        if (((is_demo_app() == false) || ($this->getAttribute((isset($context["login"]) ? $context["login"] : null), "is_admin") == false))) {
            // line 21
            echo "            <td width=\"20%\">
                <button type=\"submit\" class=\"btn btn-primary\">Update</button>
            </td>";
        }
        // line 25
        echo "        </tr>
    </tbody>
</table>";
        // line 28
        echo form_close();
    }

    public function getTemplateName()
    {
        return "edit-pengajar-username.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  71 => 28,  67 => 25,  62 => 21,  60 => 20,  56 => 18,  52 => 17,  44 => 12,  40 => 11,  37 => 8,  35 => 7,  33 => 5,  31 => 4,  28 => 3,);
    }
}
