<?php

/* edit-materi.html */
class __TwigTemplate_84b7ed6f68c91c9d605c0ed55641d039890087e9396a5a76defa6b0cdb51928a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("layout-private.html");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
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
        echo "Edit Materi -";
        $this->displayParentBlock("title", $context, $blocks);
    }

    // line 7
    public function block_content($context, array $blocks = array())
    {
        // line 8
        echo "<div class=\"module\">
    <div class=\"module-head\">
        <h3>";
        // line 10
        echo anchor((isset($context["uri_back"]) ? $context["uri_back"] : null), "Materi");
        echo " / Edit Materi</h3>
    </div>
    <div class=\"module-body\">";
        // line 13
        echo get_flashdata("materi");
        // line 15
        echo form_open_multipart(((((("materi/edit/" . (isset($context["type"]) ? $context["type"] : null)) . "/") . $this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "id")) . "/") . enurl_redirect((isset($context["uri_back"]) ? $context["uri_back"] : null))), array("class" => "form-horizontal row-fluid"));
        echo "
            <div class=\"control-group\">
                <label class=\"control-label\">Judul <span class=\"text-error\">*</span></label>
                <div class=\"controls\">
                    <input type=\"text\" name=\"judul\" class=\"span12\" value=\"";
        // line 19
        echo twig_escape_filter($this->env, set_value("judul", $this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "judul")), "html", null, true);
        echo "\">
                    <br>";
        // line 20
        echo form_error("judul");
        echo "
                </div>
            </div>
            <div class=\"control-group\">
                <label class=\"control-label\">Matapelajaran <span class=\"text-error\">*</span></label>
                <div class=\"controls\">
                    <select name=\"mapel_id\">
                        <option value=\"\">--pilih--</option>";
        // line 28
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["mapel"]) ? $context["mapel"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["m"]) {
            // line 29
            echo "                        <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id"), "html", null, true);
            echo "\"";
            echo twig_escape_filter($this->env, set_select("mapel_id", $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id"), ((($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id") == $this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "mapel_id"))) ? (true) : (""))), "html", null, true);
            echo ">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "nama"), "html", null, true);
            echo "</option>";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['m'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 31
        echo "                    </select>
                    <br>";
        // line 32
        echo form_error("mapel_id");
        echo "
                </div>
            </div>
            <div class=\"control-group\">
                <label class=\"control-label\">Kelas <span class=\"text-error\">*</span></label>
                <div class=\"controls\">
                    <ul class=\"unstyled inline\" style=\"margin-left: -5px;\">";
        // line 39
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["kelas"]) ? $context["kelas"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["k"]) {
            // line 40
            echo "                        <li>
                            <label class=\"checkbox inline\">
                                <input type=\"checkbox\" name=\"kelas_id[]\" value=\"";
            // line 42
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["k"]) ? $context["k"] : null), "id"), "html", null, true);
            echo "\"";
            echo twig_escape_filter($this->env, set_checkbox("kelas_id[]", $this->getAttribute((isset($context["k"]) ? $context["k"] : null), "id"), ((in_array($this->getAttribute((isset($context["k"]) ? $context["k"] : null), "id"), (isset($context["materi_kelas"]) ? $context["materi_kelas"] : null))) ? (true) : (""))), "html", null, true);
            echo ">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["k"]) ? $context["k"] : null), "nama"), "html", null, true);
            echo "
                            </label>
                        </li>";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['k'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 46
        echo "                    </ul>";
        // line 47
        echo form_error("kelas_id[]");
        echo "
                </div>
            </div>";
        // line 50
        if (((isset($context["type"]) ? $context["type"] : null) == "tertulis")) {
            // line 51
            echo "            <div class=\"control-group\">
                <label class=\"control-label\">Konten <span class=\"text-error\">*</span></label>
                <div class=\"controls\">
                    <textarea name=\"konten\" id=\"konten\" class=\"\">";
            // line 54
            echo set_value("konten", $this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "konten"));
            echo "</textarea>";
            // line 55
            echo form_error("konten");
            echo "
                </div>
            </div>";
        } elseif (((isset($context["type"]) ? $context["type"] : null) == "file")) {
            // line 59
            echo "            <div class=\"control-group\">
                <label class=\"control-label\">Info File</label>
                <div class=\"controls\">
                    <table class=\"table table-condensed table-striped\">
                        <tbody>
                            <tr>
                                <th>Name</th>
                                <td><a href=\"";
            // line 66
            echo twig_escape_filter($this->env, base_url(("userfiles/files/" . $this->getAttribute((isset($context["file_info"]) ? $context["file_info"] : null), "name"))), "html", null, true);
            echo "\" target=\"_tab\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["file_info"]) ? $context["file_info"] : null), "name"), "html", null, true);
            echo "</a></td>
                            </tr>
                            <tr>
                                <th>Server Path</th>
                                <td>";
            // line 70
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["file_info"]) ? $context["file_info"] : null), "server_path"), "html", null, true);
            echo "</td>
                            </tr>
                            <tr>
                                <th>Size</th>
                                <td>";
            // line 74
            echo twig_escape_filter($this->env, byte_format($this->getAttribute((isset($context["file_info"]) ? $context["file_info"] : null), "size")), "html", null, true);
            echo "</td>
                            </tr>
                            <tr>
                                <th>Modified</th>
                                <td>";
            // line 78
            echo twig_escape_filter($this->env, mdate("%d %F %Y %H:%i", $this->getAttribute((isset($context["file_info"]) ? $context["file_info"] : null), "date")), "html", null, true);
            echo "</td>
                            </tr>
                            <tr>
                                <th>Mime</th>
                                <td>";
            // line 82
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["file_info"]) ? $context["file_info"] : null), "mime"), "html", null, true);
            echo "</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class=\"control-group\">
                <label class=\"control-label\">Ganti File</label>
                <div class=\"controls\">
                    <input type=\"file\" name=\"userfile\">
                    <br>";
            // line 92
            echo (((!twig_test_empty((isset($context["error_upload"]) ? $context["error_upload"] : null)))) ? ((isset($context["error_upload"]) ? $context["error_upload"] : null)) : (""));
            echo "
                </div>
            </div>";
        }
        // line 96
        echo "            <div class=\"control-group\">
                <label class=\"control-label\">Status <span class=\"text-error\">*</span></label>
                <div class=\"controls\">
                    <label class=\"radio\">
                        <input type=\"radio\" name=\"publish\" value=\"1\"";
        // line 100
        echo twig_escape_filter($this->env, set_radio("publish", "1", (($this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "publish")) ? (true) : (""))), "html", null, true);
        echo "> Terbit
                    </label>
                    <label class=\"radio\">
                        <input type=\"radio\" name=\"publish\" value=\"0\"";
        // line 103
        echo twig_escape_filter($this->env, set_radio("publish", "0", ((($this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "publish") == 0)) ? (true) : (""))), "html", null, true);
        echo "> Konsep
                    </label>
                </div>
            </div>
            <div class=\"control-group\">
                <div class=\"controls\">
                    <button type=\"submit\" class=\"btn btn-primary\">Update</button>
                    <a href=\"";
        // line 110
        echo twig_escape_filter($this->env, (isset($context["uri_back"]) ? $context["uri_back"] : null), "html", null, true);
        echo "\" class=\"btn btn-default\">Kembali</a>
                </div>
            </div>";
        // line 113
        echo form_close();
        echo "

    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "edit-materi.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  229 => 113,  224 => 110,  214 => 103,  208 => 100,  202 => 96,  196 => 92,  183 => 82,  176 => 78,  169 => 74,  162 => 70,  153 => 66,  144 => 59,  138 => 55,  135 => 54,  130 => 51,  128 => 50,  123 => 47,  121 => 46,  108 => 42,  104 => 40,  100 => 39,  91 => 32,  88 => 31,  76 => 29,  72 => 28,  62 => 20,  58 => 19,  51 => 15,  49 => 13,  44 => 10,  40 => 8,  37 => 7,  32 => 4,  29 => 3,);
    }
}
