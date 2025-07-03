import _                            from "lodash";
import $                            from "jquery";
import axios                        from "axios";
import * as bootstrap               from "bootstrap";
import * as OverlayScrollbarsGlobal from "overlayscrollbars";

window._                                                   = _;
window.$                                                   = $;
window.bootstrap                                           = bootstrap;
window.axios                                               = axios;
window.axios.defaults.headers.common[ "X-Requested-With" ] = "XMLHttpRequest";
window.axios.defaults.headers.common[ "X-CSRF-TOKEN"     ] = document.querySelector( 'meta[name="csrf-token"]' ).getAttribute( "content" );
window.OverlayScrollbarsGlobal                             = OverlayScrollbarsGlobal;

import "jquery-mask-plugin";
import "@popperjs/core";
import "admin-lte";
