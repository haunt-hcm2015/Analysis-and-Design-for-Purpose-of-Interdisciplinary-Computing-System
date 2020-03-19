# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class MaterialVotes(models.Model):
    _name = 'medical.material.votes'
    _description = 'Material Votes Model'
class MaterialVotesType(models.Model):
    _name = 'medical.material.votes.type'
    _description = 'Material Votes Type Model'