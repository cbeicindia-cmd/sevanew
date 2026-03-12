from fastapi import FastAPI
from pydantic import BaseModel
from typing import Optional, List, Dict

app = FastAPI(title='SEVA SETU KENDRA AI Engine')

class Profile(BaseModel):
    state: str
    income: str
    age: Optional[int] = None
    gender: Optional[str] = None
    category: Optional[str] = None

@app.post('/recommend')
def recommend(profile: Profile) -> Dict[str, List[Dict[str, str]]]:
    recommendations = [
        {
            'scheme_name': f'SEVA Targeted Benefit - {profile.state}',
            'reason': f"Matched by state {profile.state} and income {profile.income}",
        },
        {
            'scheme_name': 'National Social Assistance Program',
            'reason': 'Broad welfare coverage for lower income groups',
        },
    ]

    if profile.category:
        recommendations.append({
            'scheme_name': f'{profile.category} Support Mission',
            'reason': f'Category specific recommendation for {profile.category}',
        })

    return {'recommendations': recommendations}
