from fastapi import FastAPI
from pydantic import BaseModel

app = FastAPI(title='SEVA SETU KENDRA AI API')

class Profile(BaseModel):
    state: str
    income: float | None = None
    age: int | None = None
    gender: str | None = None
    category: str | None = None

@app.post('/recommend')
def recommend(profile: Profile):
    return {
        'platform': 'SEVA SETU KENDRA',
        'message': 'Rule-based recommendation stub; integrate Laravel schemes table for live data.',
        'query': profile.model_dump(),
        'results': [
            {'scheme_name': 'SEVA SETU Scheme 102', 'reason': 'Matches state and category'},
            {'scheme_name': 'SEVA SETU Scheme 876', 'reason': 'Low income support eligibility'}
        ]
    }
