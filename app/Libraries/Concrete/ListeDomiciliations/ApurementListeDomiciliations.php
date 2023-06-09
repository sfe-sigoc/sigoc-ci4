- release_tracks: [ALPHA]
  help_text:
    brief: Create a new Beyondcorp application legacy connector.
    description: Create a new Beyondcorp application legacy connector.
    examples: |
      The following command creates a Connector with ID ``my-connector'' in the default user project:

        $ {command} my-connector \
            --location=us-central1 \
            --member=serviceAccount:connector-sa@projectId.iam.gserviceaccount.com

      The following command creates a Connector with ID ``my-connector'' with explicit project value
      for all required and optional parameters:

        $ {command} my-connector \
            --project=projectId \
            --location=us-central1 \
            --member=serviceAccount:connector-sa@projectId.iam.gserviceaccount.com \
            --labels='foo=bar' \
            --display-name=connector-display-name
            --async

  request:
    collection: beyondcorp.projects.locations.connectors

  async:
    collection: beyondcorp.projects.locations.operations

  arguments:
    resource:
      help_text: The Beyondcorp connector you want to create.
      spec: !REF googlecloudsdk.command_lib.beyondcorp.app.resources:connector

    params:
    - _REF_: googlecloudsdk.command_lib.beyondcorp.app.connectors.flags:legacy_service_account
    - _REF_: googlecloudsdk.command_lib.beyondcorp.app.