<?php

/* table/search/rows_normal.twig */
class __TwigTemplate_9926e4aec73ab000cef4d9761257596917c3d95f5afe8ef66287c78840141c92 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(range(0, (twig_length_filter($this->env, ($context["column_names"] ?? null)) - 1)));
        foreach ($context['_seq'] as $context["_key"] => $context["column_index"]) {
            // line 2
            echo "    <tr class=\"noclick\">";
            // line 4
            if (($context["geom_column_flag"] ?? null)) {
                // line 5
                $this->loadTemplate("table/search/geom_func.twig", "table/search/rows_normal.twig", 5)->display(["column_index" =>                 // line 6
$context["column_index"], "column_types" =>                 // line 7
($context["column_types"] ?? null)]);
            }
            // line 11
            echo "        <th>";
            // line 12
            echo twig_escape_filter($this->env, $this->getAttribute(($context["column_names"] ?? null), $context["column_index"], [], "array"), "html", null, true);
            echo "
        </th>";
            // line 14
            $context["properties"] = $this->getAttribute(($context["self"] ?? null), "getColumnProperties", [0 => $context["column_index"], 1 => $context["column_index"]], "method");
            // line 15
            echo "        <td dir=\"ltr\">";
            // line 16
            echo twig_escape_filter($this->env, $this->getAttribute(($context["properties"] ?? null), "type", [], "array"), "html", null, true);
            echo "
        </td>
        <td>";
            // line 19
            echo twig_escape_filter($this->env, $this->getAttribute(($context["properties"] ?? null), "collation", [], "array"), "html", null, true);
            echo "
        </td>
        <td>";
            // line 22
            echo $this->getAttribute(($context["properties"] ?? null), "func", [], "array");
            echo "
        </td>";
            // line 25
            echo "        <td data-type=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["properties"] ?? null), "type", [], "array"), "html", null, true);
            echo "\">";
            // line 26
            echo $this->getAttribute(($context["properties"] ?? null), "value", [], "array");
            // line 28
            echo "            <input type=\"hidden\"
                name=\"criteriaColumnNames[";
            // line 29
            echo twig_escape_filter($this->env, $context["column_index"], "html", null, true);
            echo "]\"
                value=\"";
            // line 30
            echo twig_escape_filter($this->env, $this->getAttribute(($context["column_names"] ?? null), $context["column_index"], [], "array"), "html", null, true);
            echo "\" />
            <input type=\"hidden\"
                name=\"criteriaColumnTypes[";
            // line 32
            echo twig_escape_filter($this->env, $context["column_index"], "html", null, true);
            echo "]\"
                value=\"";
            // line 33
            echo twig_escape_filter($this->env, $this->getAttribute(($context["column_types"] ?? null), $context["column_index"], [], "array"), "html", null, true);
            echo "\" />
            <input type=\"hidden\"
                name=\"criteriaColumnCollations[";
            // line 35
            echo twig_escape_filter($this->env, $context["column_index"], "html", null, true);
            echo "]\"
                value=\"";
            // line 36
            echo twig_escape_filter($this->env, $this->getAttribute(($context["column_collations"] ?? null), $context["column_index"], [], "array"), "html", null, true);
            echo "\" />
        </td>
    </tr>";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['column_index'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "table/search/rows_normal.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  87 => 36,  83 => 35,  78 => 33,  74 => 32,  69 => 30,  65 => 29,  62 => 28,  60 => 26,  56 => 25,  52 => 22,  47 => 19,  42 => 16,  40 => 15,  38 => 14,  34 => 12,  32 => 11,  29 => 7,  28 => 6,  27 => 5,  25 => 4,  23 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "table/search/rows_normal.twig", "D:\\phpstudy_pro\\WWW\\back\\public\\phpMyAdmin4.8.5\\templates\\table\\search\\rows_normal.twig");
    }
}
