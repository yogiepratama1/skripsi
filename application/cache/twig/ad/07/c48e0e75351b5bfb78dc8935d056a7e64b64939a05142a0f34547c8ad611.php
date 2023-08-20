<?php

/* print-nilai.html */
class __TwigTemplate_ad07c48e0e75351b5bfb78dc8935d056a7e64b64939a05142a0f34547c8ad611 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("layout-print.html");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout-print.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        // line 4
        echo "    Print nilai -";
        $this->displayParentBlock("title", $context, $blocks);
    }

    // line 7
    public function block_content($context, array $blocks = array())
    {
        // line 8
        echo "<b>Nilai";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "judul"), "html", null, true);
        echo ", &nbsp;";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "mapel"), "nama"), "html", null, true);
        echo "</b>";
        // line 10
        if (($this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "type_id") == 3)) {
            // line 11
            echo "<table class=\"table table-bordered table-striped\">
    <thead>
        <tr>
            <th width=\"5%\">No</th>
            <th>Nis</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Tahun Ajaran</th>";
            // line 19
            if (((isset($context["tampil_jawaban"]) ? $context["tampil_jawaban"] : null) == 1)) {
                // line 20
                echo "            <th>Jawaban (no_soal. kunci:jawaban, ...)</th>";
            }
            // line 22
            echo "            <th>Benar</th>
            <th>Salah</th>
            <th>Kosong</th>
            <th>Nilai</th>
        </tr>
    </thead>
    <tbody>";
            // line 29
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["data_nilai"]) ? $context["data_nilai"] : null));
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["n"]) {
                // line 30
                echo "        <tr>
            <td>";
                // line 31
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "index"), "html", null, true);
                echo ".</td>
            <td>";
                // line 32
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["n"]) ? $context["n"] : null), "siswa"), "nis"), "html", null, true);
                echo "</td>
            <td>";
                // line 33
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["n"]) ? $context["n"] : null), "siswa"), "nama"), "html", null, true);
                echo "</td>
            <td>";
                // line 34
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["n"]) ? $context["n"] : null), "siswa"), "kelas_aktif"), "nama"), "html", null, true);
                echo "</td>
            <td>";
                // line 35
                echo twig_escape_filter($this->env, (isset($context["tahun_ajaran"]) ? $context["tahun_ajaran"] : null), "html", null, true);
                echo "</td>";
                // line 36
                if (((isset($context["tampil_jawaban"]) ? $context["tampil_jawaban"] : null) == 1)) {
                    // line 37
                    echo "            <td>";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["n"]) ? $context["n"] : null), "tampil_jawaban"), "html", null, true);
                    echo "</td>";
                }
                // line 39
                echo "            <td>";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["n"]) ? $context["n"] : null), "history"), "value"), "jml_benar"), "html", null, true);
                echo "</td>
            <td>";
                // line 40
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["n"]) ? $context["n"] : null), "history"), "value"), "jml_salah"), "html", null, true);
                echo "</td>
            <td>";
                // line 41
                echo twig_escape_filter($this->env, (((count($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["n"]) ? $context["n"] : null), "history"), "value"), "pertanyaan_id")) != ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["n"]) ? $context["n"] : null), "history"), "value"), "jml_benar") + $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["n"]) ? $context["n"] : null), "history"), "value"), "jml_salah")))) ? (abs((count($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["n"]) ? $context["n"] : null), "history"), "value"), "pertanyaan_id")) - ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["n"]) ? $context["n"] : null), "history"), "value"), "jml_benar") + $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["n"]) ? $context["n"] : null), "history"), "value"), "jml_salah"))))) : (0)), "html", null, true);
                echo "</td>
            <td>";
                // line 42
                echo twig_escape_filter($this->env, round($this->getAttribute((isset($context["n"]) ? $context["n"] : null), "nilai"), 2), "html", null, true);
                echo "</td>
        </tr>";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['n'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 45
            echo "    </tbody>
</table>";
        }
        // line 49
        if ((($this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "type_id") == 2) || ($this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "type_id") == 1))) {
            // line 50
            echo "<table class=\"table table-bordered table-striped\">
    <thead>
        <tr>
            <th width=\"5%\">No</th>
            <th>Nis</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Tahun Ajaran</th>
            <th>Nilai</th>
        </tr>
    </thead>
    <tbody>";
            // line 62
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["data_siswa"]) ? $context["data_siswa"] : null));
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["s"]) {
                // line 63
                echo "        <tr>
            <td>";
                // line 64
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "index"), "html", null, true);
                echo ".</td>
            <td>";
                // line 65
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["s"]) ? $context["s"] : null), "nis"), "html", null, true);
                echo "</td>
            <td>";
                // line 66
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["s"]) ? $context["s"] : null), "nama"), "html", null, true);
                echo "</td>
            <td>";
                // line 67
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["s"]) ? $context["s"] : null), "kelas_aktif"), "nama"), "html", null, true);
                echo "</td>
            <td>";
                // line 68
                echo twig_escape_filter($this->env, (isset($context["tahun_ajaran"]) ? $context["tahun_ajaran"] : null), "html", null, true);
                echo "</td>
            <td>";
                // line 69
                echo twig_escape_filter($this->env, round($this->getAttribute($this->getAttribute((isset($context["s"]) ? $context["s"] : null), "nilai"), "nilai"), 2), "html", null, true);
                echo "</td>
        </tr>";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['s'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 72
            echo "    </tbody>
</table>";
        }
    }

    public function getTemplateName()
    {
        return "print-nilai.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  220 => 72,  204 => 69,  200 => 68,  196 => 67,  192 => 66,  188 => 65,  184 => 64,  181 => 63,  164 => 62,  151 => 50,  149 => 49,  145 => 45,  129 => 42,  125 => 41,  121 => 40,  116 => 39,  111 => 37,  109 => 36,  106 => 35,  102 => 34,  98 => 33,  94 => 32,  90 => 31,  87 => 30,  70 => 29,  62 => 22,  59 => 20,  57 => 19,  48 => 11,  46 => 10,  40 => 8,  37 => 7,  32 => 4,  29 => 3,);
    }
}
