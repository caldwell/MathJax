<?php if(!defined('APPLICATION')) exit();

$PluginInfo['MathJax'] = array(
   'Name' => 'LaTeX Math',
   'Description' => 'Integrates MathJax allowing users to use LaTeX math notation in comments using the [math] tag.',
   'Version' => '1.2',
   'Author' => 'Peregrine'
);

class LoadMathJax extends Gdn_Plugin {

    public function DiscussionController_Render_Before($Sender) {
        $this->Add_Resource($Sender);
    }

    public function Add_Resource($Sender) {
        $Sender->Head->AddString($this->_mymathjax());
        $Sender->AddJsFile("redraw.js", "plugins/MathJax");
    }

    private function _mymathjax() {
        $html = <<<EOF
        <script type="text/javascript"
        src="http://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS_HTML">
        </script>
            <script>
            MathJax.Hub.Config({
                tex2jax: {
                    // inlineMath: [$'\(','\)'$],
                                          inlineMath: [ ['[math]','[/math]'], ['\\(','\\)'] ]
                                        //   inlineMath: [ ['$$','$$'], ['\\(','\\)'] ]

                }
            });
        </script>
EOF;

        return $html;
    }

}
