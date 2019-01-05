import * as React from "react";
import { InlineEditButton } from "../InlineEditButton";
import { InlineSnippetControllerProps } from "./InlineSnippetController";
import { SelectorSnippet } from "../../classes/Snippets/SelectorSnippet";
import { ScoreboardObjectiveSnippet } from "../../classes/Snippets/ScoreboardObjectiveSnippet";

export interface InlineScoreboardObjectiveSnippetControllerProps extends InlineSnippetControllerProps {
  snippet: ScoreboardObjectiveSnippet
}

export class InlineScoreboardObjectiveSnippetController extends React.Component<InlineScoreboardObjectiveSnippetControllerProps, {}> {

  constructor(props: InlineScoreboardObjectiveSnippetControllerProps) {
    super(props)

    this.changeScoreName = this.changeScoreName.bind(this)
    this.changeScoreObjective = this.changeScoreObjective.bind(this)
    this.updateField = this.updateField.bind(this)
  }

  changeScoreName(event: any) {
    this.updateField("score_name", event.target.value)
  }

  changeScoreObjective(event: any) {
      this.updateField("score_objective", event.target.value)
  }

  updateField(field: string, value: any) {
    let newSnippet = this.props.snippet.copy()
    newSnippet[field] = value
    this.props.updateSnippet(newSnippet)
  }

  render() {
    return (
      <div className="row margin-below">
        <div className="col-1">
          <InlineEditButton onClick={() => { this.props.startEditingSnippet(this.props.snippet) }} />
        </div>
        <div className="col">
          <input className="form-control" placeholder="Player" value={this.props.snippet.score_name} onChange={this.changeScoreName} />
        </div>
        <div className="col">
          <input className="form-control" placeholder="Objective" value={this.props.snippet.score_objective} onChange={this.changeScoreObjective} />
        </div>
      </div>
    )
  }
}