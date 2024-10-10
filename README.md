# I didn't implement endDate in HeavenlyTours 
Cause there is not enough data about the way.
and online-searching is not good way to implement it.

## If we want to implementing it:
In the current setup, the Heavenly Tours API requires multiple requests to fetch tours based on startDate and endDate. Therefore, we will implement a short-polling structure with a new endpoint called /result.

## Search Process
1. Search Request:
   - When a customer initiates a search, we will retrieve all online search providers.
   Simultaneously, we will dispatch an event for offline search providers.
     
2. Event Handling:
   - In a queue listener, we will send requests to the Heavenly Tours API for startDate until endDate and get products save into the some database.
   
3. Result Retrieval:
    - On the client side, users will periodically request the /result endpoint until the is_finished key in the response is set to true.

## Reasoning
Real-Time Search Limitations:
The online search method is not optimal for these types of providers due to the nature of their API, which does not support immediate results.
Given the absence of detailed documentation on real-time search functionality, this approach has been deemed necessary.
