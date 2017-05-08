#Observations

- I implemented the strategy pattern to solve which parser apply to each different source.
- The DummyVideoRepository doesn't persist anything, just echo the information.
- About tests: 
    * Unit test: VideoTest
    * Functional test using Mocks: VideoCommandTest
    * Functional test using DI: ParserCommandTest, ImportCommandTest
    * Kind of Integration test as it's testing the console command: ImportConsoleCommandTest
- If I would have more time I would like to add:
    * Fixtures for testing
    * Persistence