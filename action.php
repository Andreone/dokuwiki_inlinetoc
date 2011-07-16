<?php
/**
 * InlineTOC-Plugin: Renders the page's toc inside the page content
 *
 * @license GPL v2 (http://www.gnu.org/licenses/gpl.html)
 * @author  Andreone
 */

if(!defined('DOKU_INC')) die();
if(!defined('DOKU_PLUGIN')) define('DOKU_PLUGIN',DOKU_INC.'lib/plugins/');

require_once(DOKU_PLUGIN.'action.php');

class action_plugin_inlinetoc extends DokuWiki_Action_Plugin {

 /**
   * Register event handlers
   */
  function register(&$controller) {
    $controller->register_hook('RENDERER_CONTENT_POSTPROCESS', 'AFTER', $this, 'handle_renderer_content_postprocess', array());
    $controller->register_hook('TPL_METAHEADER_OUTPUT', 'BEFORE', $this, 'handle_metaheader_output', array());
  }

  /**
   * Replace our placeholder with the toc content
   */
  function handle_renderer_content_postprocess(&$event, $param) {
    global $TOC;
    if ($TOC) {
      $event->data[1] = str_replace('<!-- INLINETOCPLACEHOLDER -->',
                                    '<div class="inlinetoc2">' . html_buildlist($TOC, 'toc', 'html_list_toc') . '</div>',
                                    $event->data[1]);
    }
  }
}
