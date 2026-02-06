<?php

return [
    "consentModal" => [
        "title" => "Cookies",
        "description" => "We use cookies to ensure you get the best experience on our website.",
        "acceptAllBtn" => "Accept",
        "acceptNecessaryBtn" => "Reject",
        "showPreferencesBtn" => "Settings"
    ],
    "preferencesModal" => [
        "title" => "Cookies",
        "acceptAllBtn" => "Accept All",
        "acceptNecessaryBtn" => "Reject All",
        "savePreferencesBtn" => "Save settings",
        "closeIconLabel" => "Close",
        "sections" => [
            [
                "title" => "Cookie Preferences",
                "description" => "We use cookies to ensure you get the best experience on our website."
            ],
            [
                "title" => "Necessary",
                "description" => "These cookies are used for activities that are strictly necessary to operate or deliver the service you requested from us.",
                "linkedCategory" => "necessary"
            ],
            [
                "title" => "Functionality",
                "description" => "These cookies enable basic interactions and functionalities that allow you to access selected features of our service and facilitate your communication with us.",
                "linkedCategory" => "functionality",
            ],
            [
                "title" => "Experience",
                "description" => "These cookies help us to improve the quality of your user experience and enable interactions with external content, networks and platforms.",
                "linkedCategory" => "experience",
            ],
            [
                "title" => "Measurement",
                "description" => "These cookies help us to measure traffic and analyze your behavior to improve our service.",
                "linkedCategory" => "measurement",
            ],
            [
                "title" => "Marketing",
                "description" => "These cookies help us to deliver personalized ads or marketing content to you, and to measure their performance.",
                "linkedCategory" => "marketing",
            ]
        ]
    ]
];
?>