#Code Structure

* app
    - config: config files
    - feed-exports: examples of the feeds to export
* etc
    - development: docker files for development environment
* src: location of the code 
    - Application
        - UseCase
            - Parser
                - Request
            - Video
                - Request
    - Domain
        - Parser
            - Exception
            - Factory
        - Video
            - Exception
            - Factory
            - Model
            - Repository
    - Infrastructure
        - ParserBundle
            - DependencyInjection
            - Factory
            - Resources
                - config
                    - application
                    - services
        - VideoBundle
            - Command
            - DependencyInjection
            - Factory
            - Repository
            - Resources
                - config
                    - application
                    - services
* tests: test files (same structure than src)