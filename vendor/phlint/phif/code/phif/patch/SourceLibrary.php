<?php

namespace phif\patch;

use \phif\NodeFacade;
use \phif\Parser;
use \Phif;
use \PhpParser\Comment;
use \PhpParser\Node;

class SourceLibrary {

  static function patch ($blueprint) {

    $blueprint['c_mongogridfs.a_sourceLibrary'] = Phif::sourceLibrary('mongo');
    $blueprint['f_mysqli_disable_reads_from_master.a_sourceLibrary'] = Phif::sourceLibrary('mysqli');
    $blueprint['f_mysqli_disable_rpl_parse.a_sourceLibrary'] = Phif::sourceLibrary('mysqli');
    $blueprint['f_mysqli_embedded_server_end.a_sourceLibrary'] = Phif::sourceLibrary('mysqli');
    $blueprint['f_mysqli_embedded_server_start.a_sourceLibrary'] = Phif::sourceLibrary('mysqli');
    $blueprint['f_mysqli_enable_reads_from_master.a_sourceLibrary'] = Phif::sourceLibrary('mysqli');
    $blueprint['f_mysqli_enable_rpl_parse.a_sourceLibrary'] = Phif::sourceLibrary('mysqli');
    $blueprint['f_mysqli_get_cache_stats.a_sourceLibrary'] = Phif::sourceLibrary('mysqli');
    $blueprint['f_mysqli_master_query.a_sourceLibrary'] = Phif::sourceLibrary('mysqli');
    $blueprint['f_mysqli_rpl_parse_enabled.a_sourceLibrary'] = Phif::sourceLibrary('mysqli');
    $blueprint['f_mysqli_rpl_probe.a_sourceLibrary'] = Phif::sourceLibrary('mysqli');
    $blueprint['f_mysqli_rpl_query_type.a_sourceLibrary'] = Phif::sourceLibrary('mysqli');
    $blueprint['f_mysqli_send_query.a_sourceLibrary'] = Phif::sourceLibrary('mysqli');
    $blueprint['f_mysqli_set_local_infile_default.a_sourceLibrary'] = Phif::sourceLibrary('mysqli');
    $blueprint['f_mysqli_set_local_infile_handler.a_sourceLibrary'] = Phif::sourceLibrary('mysqli');
    $blueprint['f_mysqli_slave_query.a_sourceLibrary'] = Phif::sourceLibrary('mysqli');
  }

}
