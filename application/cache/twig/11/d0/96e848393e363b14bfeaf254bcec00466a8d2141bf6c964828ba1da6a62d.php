<?php

/* list-komentar.html */
class __TwigTemplate_11d096e848393e363b14bfeaf254bcec00466a8d2141bf6c964828ba1da6a62d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("layout-private.html");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'css' => array($this, 'block_css'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout-private.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        // line 4
        echo "Komentar Materi -";
        $this->displayParentBlock("title", $context, $blocks);
    }

    // line 7
    public function block_css($context, array $blocks = array())
    {
        // line 8
        echo "<style type=\"text/css\">
    .komentar img {
        height: auto;
        max-width: 100%;
        width: auto;
    }
    table {
        table-layout: fixed;
    }
</style>";
    }

    // line 20
    public function block_content($context, array $blocks = array())
    {
        // line 21
        echo "<div class=\"module\">
    <div class=\"module-head\">
        <h3>Komentar Materi</h3>
    </div>
    <div class=\"module-body\">";
        // line 26
        echo get_flashdata("komentar");
        // line 28
        if (is_admin()) {
            // line 29
            echo "        <div class=\"btn-group\">
            <a href=\"";
            // line 30
            echo twig_escape_filter($this->env, site_url("materi/komentar"), "html", null, true);
            echo "\" class=\"btn btn-sm btn-primary\">Semua</a>
            <a href=\"";
            // line 31
            echo twig_escape_filter($this->env, site_url("materi/komentar/laporan"), "html", null, true);
            echo "\" class=\"btn btn-sm btn-default\">Laporan";
            echo twig_escape_filter($this->env, ((((isset($context["jml_laporan_baru"]) ? $context["jml_laporan_baru"] : null) > 0)) ? ((("(" . (isset($context["jml_laporan_baru"]) ? $context["jml_laporan_baru"] : null)) . ")")) : ("")), "html", null, true);
            echo "</a>
        </div>
        <br><br>";
        }
        // line 35
        echo "
        <table class=\"table table-striped datatable\">
            <thead>
                <tr>
                    <th width=\"5%\">ID</th>
                    <th>Komentar</th>
                </tr>
            </thead>
            <tbody>";
        // line 44
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["komentar"]) ? $context["komentar"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["k"]) {
            // line 45
            echo "                <tr>
                    <td>
                        <b>";
            // line 47
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["k"]) ? $context["k"] : null), "id"), "html", null, true);
            echo "</b>";
            // line 48
            if (is_admin()) {
                // line 49
                echo "                        <br>
                        <a href=\"";
                // line 50
                echo twig_escape_filter($this->env, site_url(("materi/komentar/delete/" . $this->getAttribute((isset($context["k"]) ? $context["k"] : null), "id"))), "html", null, true);
                echo "\" onclick=\"return confirm('Anda yakin ingin menghapus komentar ini?')\"><i class=\"icon icon-trash\"></i></a>";
            }
            // line 52
            echo "                    </td>
                    <td>
                        <div class=\"media\">
                            <div class=\"pull-right\">
                                <img src=\"";
            // line 56
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["k"]) ? $context["k"] : null), "login"), "link_image"), "html", null, true);
            echo "\" style=\"height:25px;width:25px;\" class=\"img-circle img-polaroid\">
                            </div>
                            <div class=\"media-body\">
                                <p><a href=\"";
            // line 59
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["k"]) ? $context["k"] : null), "login"), "link_profil"), "html", null, true);
            echo "\"><b>";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["k"]) ? $context["k"] : null), "login"), "nama"), "html", null, true);
            echo "</b></a>, <small>";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["k"]) ? $context["k"] : null), "tgl_posting"), "d F Y"), "html", null, true);
            echo "</small> | <b><a href=\"";
            echo twig_escape_filter($this->env, site_url(("materi/detail/" . $this->getAttribute($this->getAttribute((isset($context["k"]) ? $context["k"] : null), "materi"), "id"))), "html", null, true);
            echo "\" target=\"_blank\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["k"]) ? $context["k"] : null), "materi"), "judul"), "html", null, true);
            echo "</a></b></p>";
            // line 60
            echo $this->getAttribute((isset($context["k"]) ? $context["k"] : null), "konten");
            echo "
                            </div>
                        </div>
                    </td>
                </tr>";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['k'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 66
        echo "            </tbody>
        </table>

    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "list-komentar.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  146 => 66,  135 => 60,  124 => 59,  118 => 56,  112 => 52,  108 => 50,  105 => 49,  103 => 48,  100 => 47,  96 => 45,  92 => 44,  82 => 35,  74 => 31,  70 => 30,  67 => 29,  65 => 28,  63 => 26,  57 => 21,  54 => 20,  41 => 8,  38 => 7,  33 => 4,  30 => 3,);
    }
}
