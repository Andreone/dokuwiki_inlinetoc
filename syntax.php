<?php
/**
 * InlineTOC-Plugin: Renders the page's toc inside the page content
 *
 * @license GPL v2 (http://www.gnu.org/licenses/gpl.html)
 * @author  Andreone
 */

if(!defined('DOKU_INC')) die();

/**
 * Class renders inlinetoc syntax
 */
class syntax_plugin_inlinetoc extends DokuWiki_Syntax_Plugin {

    /**
     * What kind of syntax are we?
     */
    function getType() {
        return 'substition';
    }

    /**
     * Where to sort in? (took the same as for ~~NOTOC~~)
     */
    function getSort() {
        return 30;
    }

    /**
     * What kind of type are we?
     */
    function getPType() {
        return 'block';
    }

    /**
     * Connect pattern to lexer
     *
     * @param string $mode
     */
    function connectTo($mode) {
        $this->Lexer->addSpecialPattern('{{INLINETOC}}', $mode, 'plugin_inlinetoc');
    }

    /**
     * Handle the match
     *
     * @param string $match
     * @param int $state
     * @param int $pos
     * @param Doku_Handler $handler
     * @return array|bool|string
     */
    function handle($match, $state, $pos, Doku_Handler $handler) {
        return '';
    }

    /**
     * Add placeholder to cached page (will be replaced by action component)
     *
     * @param string $mode
     * @param Doku_Renderer $renderer
     * @param array $data
     * @return bool
     */
    function render($mode, Doku_Renderer $renderer, $data) {

    	if ($mode == 'metadata') {
    	    /** @var Doku_Renderer_metadata $renderer */
			$renderer->meta['movetoc'] = true;
			return true;
		}
		if($mode == 'xhtml') {
            $renderer->doc .= '<!-- INLINETOCPLACEHOLDER -->';
            return true;
        }
        return false;
    }
}
