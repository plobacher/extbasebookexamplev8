
plugin.tx_simpleblog_bloglisting {
    persistence {
    # storagePid = 0,3,4,5,6
        storagePid = 2
        recursive = 1
        classes {
            Pluswerk\Simpleblog\Domain\Model\Blog {
                newRecordStoragePid = 3
            }
            Pluswerk\Simpleblog\Domain\Model\Post {
                newRecordStoragePid = 4
            }
            Pluswerk\Simpleblog\Domain\Model\Comment {
                newRecordStoragePid = 5
            }
            Pluswerk\Simpleblog\Domain\Model\Tag {
                newRecordStoragePid = 6
            }
        }
    }
    settings {
        blog {
            max = 10
        }
    }
}

# these classes are only used in auto-generated templates
plugin.tx_simpleblog._CSS_DEFAULT_STYLE (
    textarea.f3-form-error {
        background-color:#FF9F9F;
        border: 1px #FF0000 solid;
    }

    input.f3-form-error {
        background-color:#FF9F9F;
        border: 1px #FF0000 solid;
    }

    .tx-simpleblog table {
        border-collapse:separate;
        border-spacing:10px;
    }

    .tx-simpleblog table th {
        font-weight:bold;
    }

    .tx-simpleblog table td {
        vertical-align:top;
    }

    .typo3-messages .message-error {
        color:red;
    }

    .typo3-messages .message-ok {
        color:green;
    }
)

page {
  includeCSS {
    bootstrap = EXT:simpleblog/Resources/Public/Bootstrap/css/bootstrap.min.css
    simpleblog = EXT:simpleblog/Resources/Public/Css/simpleblog.css
    fa = //maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css
    fa.external = 1
  }
  includeJSLibs {
    jquery = //code.jquery.com/jquery-3.1.1.slim.min.js
    jquery.external = 1
    bootstrap = EXT:simpleblog/Resources/Public/Bootstrap/js/bootstrap.min.js
  }
}

