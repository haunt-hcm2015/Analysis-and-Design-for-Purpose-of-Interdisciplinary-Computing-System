# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class MedicalCard(models.Model):
    _name = 'medical.card'
    _description = 'Medical Card Model'

class CardType(models.Model):
    _name = 'card.type'
    _description = 'Card Type Model'
    
    


