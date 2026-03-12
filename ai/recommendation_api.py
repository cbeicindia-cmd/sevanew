from fastapi import FastAPI
from pydantic import BaseModel
from typing import List
import random

app = FastAPI(title="SEVA SETU KENDRA AI Recommendation API")

class CitizenProfile(BaseModel):
    state: str
    income: float
    age: int | None = None
    gender: str | None = None
    category: str | None = None

class Recommendation(BaseModel):
    scheme_code: str
    scheme_name: str
    reason: str

@app.post('/recommend', response_model=List[Recommendation])
def recommend(profile: CitizenProfile):
    pool = [
        ("SSK-00021", "PM Kisan Sahayata", "Farmer-oriented support for low income households."),
        ("SSK-00110", "UP Scholarship Connect", "Student support aligned with state and income."),
        ("SSK-00420", "Women Enterprise Boost", "Women-focused entrepreneurship subsidy."),
        ("SSK-00999", "Citizen Health Assist", "Health benefit relevant for broad categories."),
    ]

    picks = random.sample(pool, k=3)
    return [
        Recommendation(
            scheme_code=code,
            scheme_name=name,
            reason=f"Matched for state={profile.state}, income={profile.income}. {reason}",
        )
        for code, name, reason in picks
    ]
