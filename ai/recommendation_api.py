from fastapi import FastAPI
from pydantic import BaseModel

app = FastAPI(title="SEVA SETU KENDRA AI API")

SCHEMES = [
    {"scheme_name": "UP Rural Livelihood Support", "state": "Uttar Pradesh", "max_income": 250000, "category": "OBC", "gender": "Any", "min_age": 18},
    {"scheme_name": "National Scholarship Plus", "state": "All", "max_income": 400000, "category": "General", "gender": "Any", "min_age": 17},
    {"scheme_name": "Women Enterprise Mission", "state": "All", "max_income": 500000, "category": "Women", "gender": "Female", "min_age": 21},
]


class Profile(BaseModel):
    state: str
    income: float
    age: int
    gender: str
    category: str


@app.post('/recommend')
def recommend(profile: Profile):
    filtered = []
    for item in SCHEMES:
        if item['state'] not in [profile.state, 'All']:
            continue
        if profile.income > item['max_income']:
            continue
        if profile.age < item['min_age']:
            continue
        if item['gender'] != 'Any' and item['gender'].lower() != profile.gender.lower():
            continue
        if item['category'] not in [profile.category, 'General', 'Women']:
            continue
        filtered.append(item)

    return {
        'platform': 'SEVA SETU KENDRA',
        'tagline': 'Connecting Citizens with Government Opportunities',
        'query': profile.model_dump(),
        'recommendations': filtered,
    }
